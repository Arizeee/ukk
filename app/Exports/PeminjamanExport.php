<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PeminjamanExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Peminjaman::with('user', 'buku')->get();
    }

    public function map($peminjaman): array
    {
        return [
            $peminjaman->id,
            $peminjaman->user->username,
            $peminjaman->buku->judul,
            $peminjaman->tanggal_peminjaman,
            $peminjaman->tanggal_pengembalian,
            $peminjaman->status_peminjaman,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'User',
            'Buku',
            'Tanggal Peminjaman',
            'Tanggal Pengembalian',
            'Status Peminjaman'
        ];
    }
}
