<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Koleksi;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PeminjamanExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class PetugasPeminjamanController extends Controller
{
    public function createPeminjamanForm()
    {
        $users = User::all();
        $buku = Buku::all();

        return view('petugas.peminjaman.create', compact('users', 'buku'));
    }

    public function createPeminjaman(Request $request)
    {
        // Validasi form
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'buku_id' => 'required|exists:buku,id',
        ]);

        // Lakukan proses peminjaman di sini
        $user = User::findOrFail($request->input('user_id'));
        $buku = Buku::findOrFail($request->input('buku_id'));

        // Lakukan proses peminjaman di sini, misalnya menambahkan record ke tabel peminjaman
        $peminjaman = Peminjaman::create([
            'user_id' => $user->id,
            'buku_id' => $buku->id,
            'tanggal_peminjaman' => now(),
            'tanggal_pengembalian' => now()->addDays(14), // Contoh: 14 hari batas peminjaman
            'status_peminjaman' => 'Dipinjam',
        ]);

        Koleksi::create([
            'user_id' => $user->id,
            'buku_id' => $buku->id,
            'peminjaman_id' => $peminjaman->id,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('petugas.peminjaman.index')->with('success', 'Peminjaman berhasil.');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $peminjaman = Peminjaman::where('status_peminjaman', 'LIKE', "%$query%")->paginate(10);
        
        if ($peminjaman->isEmpty()) {
            return redirect()->route('petugas.peminjaman.index')->with('error', 'User tidak ditemukan.');
        }

        return view('petugas.peminjaman.index', compact('peminjaman'));
    }

    public function index()
    {
        // Ambil data peminjaman untuk ditampilkan di halaman index
        $peminjaman = Peminjaman::paginate(10);

        return view('petugas.peminjaman.index', compact('peminjaman'));
    }

    public function exportPdf()
    {        
        $peminjaman = Peminjaman::all();
        $pdf = Pdf::loadView('pdf.export-peminjaman', ['peminjaman' => $peminjaman])->setOption(['defaultFont' => 'sans-serif']);
        // Membuat nama file PDF dengan waktu saat ini
        $fileName = 'export-peminjaman-' . Date::now()->format('Y-m-d_H-i-s') . '.pdf';
        
        return $pdf->download($fileName);
    }

    public function exportExcel()
    {
        return (new PeminjamanExport)->download('peminjaman-'.Carbon::now()->timestamp.'.xlsx');
    }
}
