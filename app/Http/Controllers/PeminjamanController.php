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

class PeminjamanController extends Controller
{
    public function pinjamBuku($id)
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            // Ambil informasi buku yang akan dipinjam
            $buku = Buku::findOrFail($id);
            $user = auth()->user();

            // Periksa apakah pengguna sudah meminjam buku ini sebelumnya
            $isAlreadyBorrowed = Peminjaman::where('user_id', $user->id)
                ->where('buku_id', $buku->id)
                ->where('status_peminjaman', 'Dipinjam')
                ->exists();

            if ($isAlreadyBorrowed) {
                return redirect()->back()->with('error', 'Anda sudah meminjam buku ini sebelumnya.');
            }

            // Lakukan proses peminjaman di sini, misalnya menambahkan record ke tabel peminjaman
            $peminjaman = Peminjaman::create([
                'user_id' => $user->id,
                'buku_id' => $buku->id,
                // 'tanggal_peminjaman' => now(),
                // 'tanggal_pengembalian' => now()->addDays(14), // Contoh: 14 hari batas peminjaman
                // 'status_peminjaman' => '',
                'status_tunggu' => 'tunggu'
            ]);
            $user = auth()->user();
            Koleksi::create([
                'user_id' => $user->id,
                'buku_id' => $buku->id,
                'peminjaman_id' => $peminjaman->id,
            ]);
            // Setelah peminjaman berhasil, mungkin Anda ingin menampilkan pesan sukses
            return redirect()->back()->with('success', 'Peminjaman berhasil.');
        } else {
            // Jika pengguna belum login, redirect ke halaman login dengan pesan
            return redirect()->route('login')->with('error', 'Sebelum pinjam, login dulu.');
        }
    }

    public function kembalikanBuku($id, Request $request)
    {
        // Validasi input
        $request->validate([
            'comment' => 'required|max:200', // Komentar harus ada dan maksimal 200 karakter
            'rating' => 'required|integer|between:1,5', // Rating harus ada, berupa angka bulat, dan di antara 1 dan 5
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        // Perbarui TanggalPengembalian dan StatusPeminjaman
        $peminjaman->update([
            'tanggal_pengembalian' => now(),
            'status_tunggu' => 'pengembalian',
        ]);

        // Tambahkan ulasan dan rating
        $ulasanBukuData = [
            'user_id' => auth()->user()->id,
            'buku_id' => $peminjaman->buku_id,
            'ulasan' => $request->input('comment'),
            'rating' => $request->input('rating'),
        ];

        Ulasan::create($ulasanBukuData);

        // Redirect kembali
        return redirect()->back()->with('success', 'Buku telah dikembalikan.');
    }
}
