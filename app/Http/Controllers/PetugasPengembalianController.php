<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PetugasPengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data peminjaman untuk ditampilkan di halaman index
        $peminjaman = Peminjaman::orderBy('id', 'desc')->paginate(10);

        return view('petugas.pengembalian.index', compact('peminjaman'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function ajukanpengembalian($id)
    {
        // Temukan data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);

        // Perbarui status peminjaman menjadi 'pengembalian'
        $peminjaman->update(['status_tunggu' => 'pengembalian']);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Mengirim antrean pengembalian.');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
