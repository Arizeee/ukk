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

class PetugasController extends Controller
{
    public function showPetugasForm()
    {
        $bukuCount = Buku::count();
        $kategoriCount = Kategori::count();
        $usersCount = User::count();
        $peminjamanCount = Peminjaman::count();
        $pengembalianCount = Peminjaman::where('status_peminjaman', 'Dikembalikan')->count();
        return view('petugas.dashboard', ['buku_count' => $bukuCount, 'kategori_count' => $kategoriCount, 'users_count' => $usersCount, 'peminjaman_count' => $peminjamanCount, 'pengembalian_count' => $pengembalianCount]);
    }
}
