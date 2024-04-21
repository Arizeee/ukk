<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $favorites = Favorite::with('buku')->where('user_id', $userId)->get();

        // dd($favorites);

        return view('peminjam.favorite', compact('favorites'));
    }

    public function store($id, Request $request)
    {
        // Memeriksa apakah pasangan user_id dan buku_id sudah ada di tabel favorites
        $existingFavorite = Favorite::where('user_id', Auth::id())
            ->where('buku_id', $id)
            ->exists();

        // Jika pasangan sudah ada, kembalikan respons bahwa buku sudah ditandai sebagai favorit
        if ($existingFavorite) {
            return response()->json(['message' => 'Buku sudah ditandai sebagai favorit.'], 422);
        }

        // Jika belum ada, buat entri baru di tabel favorites
        Favorite::create([
            'user_id' => Auth::id(),
            'buku_id' => $id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    public function destroy($id) {
        $buku = Buku::find($id);

        $favorite = Favorite::where('user_id', Auth::id())
                            ->where('buku_id', $id)
                            ->first();
    
        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Buku berhasil dihapus dari favorit.'], 200);
        }
    
        return response()->json(['message' => 'Buku tidak ada di favorit.'], 404);
    }
}