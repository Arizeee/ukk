<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\Koleksi;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Exports\BukuExport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class PetugasBukuController extends Controller
{
    public function index()
    {
        $buku = Buku::paginate(10);
        $kategori = Kategori::all(); // Mendapatkan semua kategori
        return view('petugas.buku.index', compact('buku', 'kategori')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('petugas.buku.create', ['kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|numeric',
            'kategori_id' => 'required',
        ]);

        $sampul = $request->file('sampul');
        $sampul_name = Str::random(20) . '.' . $sampul->getClientOriginalExtension();
        $sampul->storeAs('public/buku', $sampul_name);

        $buku = new Buku([
            'judul' => $request->get('judul'),
            'sampul' => $sampul_name,
            'penulis' => $request->get('penulis'),
            'penerbit' => $request->get('penerbit'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'kategori_id' => $request->get('kategori_id'),
        ]);
        $buku->save();

        return redirect('/petugas/buku')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        return view('petugas.buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'kategori_id' => 'required|exists:kategori,id',
        ]);

        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->kategori_id = $request->kategori_id;

        if ($request->hasFile('sampul')) {
            if ($buku->sampul) {
                Storage::delete('public/buku/' . $buku->sampul);
            }
            $file = $request->file('sampul');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/buku', $filename);
            $buku->sampul = $filename;
        }

        $buku->save();

        return redirect()->route('petugas.buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $buku = Buku::where('judul', 'LIKE', "%$query%")
                    ->orWhere('penulis', 'LIKE', "%$query%")
                    ->orWhere('penerbit', 'LIKE', "%$query%")
                    ->orWhere('tahun_terbit', 'LIKE', "%$query%")
                    ->orWhereHas('kategori', function($q) use ($query) {
                        $q->where('nama_kategori', 'LIKE', "%$query%");
                    })
                    ->paginate(10);
        
        if ($buku->isEmpty()) {
            return redirect()->route('petugas.buku.index')->with('error', 'Buku tidak ditemukan.');
        }

        return view('petugas.buku.index', compact('buku'));
    }

    public function exportPdf()
    {        
        $buku = Buku::all();
        $pdf = Pdf::loadView('pdf.export-buku', ['buku' => $buku])->setOption(['defaultFont' => 'sans-serif']);
        // Membuat nama file PDF dengan waktu saat ini
        $fileName = 'export-buku-' . Date::now()->format('Y-m-d_H-i-s') . '.pdf';
        
        return $pdf->download($fileName);
    }

    public function exportExcel()
    {
        return (new BukuExport)->download('buku-'.Carbon::now()->timestamp.'.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        Storage::delete('public/buku/'.$buku->sampul);
        $buku->delete();

        return redirect('/petugas/buku')->with('success', 'Buku berhasil dihapus');
    }
}
