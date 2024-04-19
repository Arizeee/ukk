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

class PetugasKategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::paginate(10);
        return view('petugas.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('petugas.kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori'
        ]);

        Kategori::create($request->all());

        return redirect()->route('petugas.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('petugas.kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('petugas.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori,nama_kategori,' . $id
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('petugas.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $kategori = Kategori::where('nama_kategori', 'LIKE', "%$query%")->paginate(10);
        
        if ($kategori->isEmpty()) {
            return redirect()->route('petugas.kategori.index')->with('error', 'Kategori tidak ditemukan.');
        }

        return view('petugas.kategori.index', compact('kategori'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('petugas.kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
