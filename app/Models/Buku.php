<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $fillable = ['judul','sampul','stock', 'penulis','penerbit','tahun_terbit','kategori_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }
}
