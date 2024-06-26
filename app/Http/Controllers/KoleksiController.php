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

class KoleksiController extends Controller
{
    public function index()
    {
        $userHistory = Peminjaman::where('user_id', auth()->id())
            ->where('status_tunggu', '!=', 'tunggu') // Memfilter peminjaman dengan status bukan 'tunggu'
            ->pluck('id');

        $userCollection = Koleksi::where('user_id', auth()->id())
            // ->whereIn('id', $userHistory)
            ->get();

        //   dd($userCollection);

        return view('peminjam.koleksi', ['collection' => $userCollection, 'history' => $userHistory]);
    }
}
