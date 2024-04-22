<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Peminjaman extends Model
{
    use HasFactory;
    public $table = "peminjaman";

    public $fillable = [
        'user_id',
        'buku_id',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status_peminjaman',
        'status_tunggu',
        'no_telp'
    ];

    public static function getPriority()
    {
        return static::select('peminjaman.*')
            ->join(DB::raw('(SELECT buku_id, MIN(created_at) AS min_created_at FROM peminjaman WHERE status_tunggu = "tunggu" AND status_peminjaman IS NULL OR status_peminjaman = "" GROUP BY buku_id) earliest_peminjaman'), function ($join) {
                $join->on('peminjaman.buku_id', '=', 'earliest_peminjaman.buku_id');
                $join->on('peminjaman.created_at', '=', 'earliest_peminjaman.min_created_at');
            })
            ->where('peminjaman.status_tunggu', '=', 'tunggu')
            ->where(function($query) {
                $query->whereNull('peminjaman.status_peminjaman')
                    ->orWhere('peminjaman.status_peminjaman', '');
            })
            ->orderBy('peminjaman.created_at', 'asc')
            ->get();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function koleksi()
    {
        return $this->hasOne(Koleksi::class);
    }
}
