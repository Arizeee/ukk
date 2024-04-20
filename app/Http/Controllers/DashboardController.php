<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Koleksi;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showUserForm()
    {
        $buku = Buku::paginate(12);
        $kategori = Kategori::all();
        $ulasan = Ulasan::all();

        if ($buku->isEmpty()) {
            $buku = null;
        }

        return view('peminjam.dashboard', compact('buku', 'kategori', 'ulasan'));
    }

    public function showBooksByCategory($category)
    {
        $kategori = Kategori::all();
        $buku = Buku::whereHas('kategori', function ($query) use ($category) {
            $query->where('nama_kategori', $category);
        })->paginate(12);

        if ($buku->isEmpty()) {
            $buku = null;
        }

        return view('peminjam.dashboard', compact('buku', 'kategori'));
    }

    public function searchBooks(Request $request)
    {
        $kategori = Kategori::all();
        $query = $request->input('query');
        $buku = Buku::where('judul', 'LIKE', "%$query%")->paginate(12);

        if ($buku->isEmpty()) {
            $buku = null;
        }

        return view('peminjam.dashboard', compact('buku', 'kategori'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        $userId = Auth::user()->id;

        $status_tunggu = Peminjaman::where('buku_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();



        // Jika $status null, maka set nilai default
        $status = $status_tunggu ? $status_tunggu : $status_tunggu = $status_tunggu = Peminjaman::where('buku_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();;;

        $ulasan = $buku->ulasan;

        // dd($status);

        return view('peminjam.show', compact('buku', 'kategori', 'ulasan', 'status'));
    }



    public function addComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Buat komentar baru
        $komentar = new Ulasan();
        $komentar->user_id = Auth::id(); // Mengambil ID pengguna yang saat ini login
        $komentar->buku_id = $id;
        $komentar->ulasan = $request->comment;
        $komentar->rating = 0; // Anda mungkin ingin menambahkan fitur penilaian juga
        $komentar->save();

        // Redirect kembali ke halaman buku dengan pesan sukses
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function editComment($id)
    {
        $komentar = Ulasan::findOrFail($id);

        // Pastikan pengguna yang masuk adalah pemilik komentar
        if ($komentar->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit komentar ini.');
        }

        return view('peminjam.edit_comment', compact('komentar'));
    }

    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $komentar = Ulasan::findOrFail($id);

        // Pastikan pengguna yang masuk adalah pemilik komentar
        if ($komentar->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengedit komentar ini.');
        }

        $komentar->ulasan = $request->comment;
        $komentar->save();

        return redirect()->route('peminjam.show', ['id' => $komentar->buku_id])->with('success', 'Komentar berhasil diperbarui!');
    }

    public function deleteComment($id)
    {
        $komentar = Ulasan::findOrFail($id);

        // Pastikan pengguna yang masuk adalah pemilik komentar
        if ($komentar->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }

        $buku_id = $komentar->buku_id;
        $komentar->delete();

        return redirect()->route('peminjam.show', ['id' => $buku_id])->with('success', 'Komentar berhasil dihapus!');
    }
}
