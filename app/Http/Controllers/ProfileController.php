<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Koleksi;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();
        $peminjaman = Peminjaman::where('user_id', $user->id)->get();
        $totalPeminjaman = $peminjaman->where('status_peminjaman', 'Dipinjam')->count();
        $totalPengembalian = $peminjaman->where('status_peminjaman', 'Dikembalikan')->count();
        
        return view('peminjam.profile.index', compact('user','totalPeminjaman', 'totalPengembalian'));
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        if (!$user instanceof User) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        $request->validate([
            'username' => 'required|string|max:255',
            'name_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto profil
        ]);

        // Mengunggah foto profil jika ada
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                // Menghapus foto profil lama
                Storage::delete('foto/' . $user->profile_photo);
            }

            // Menyimpan foto profil baru di dalam folder public/foto
            $path = $request->file('profile_photo')->store('foto', 'public');

            // Menyimpan path foto baru ke dalam database
            $user->profile_photo = $path;
        }

        // Memperbarui data profil pengguna
        $user->username = $request->input('username');
        $user->name_lengkap = $request->input('name_lengkap');
        $user->alamat = $request->input('alamat');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
}
