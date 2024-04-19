<?php

namespace App\Exports;

use App\Models\Ulasan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UlasanExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ulasan::with('user', 'buku')->get();
    }

    public function map($ulasan): array
    {
        return [
            $ulasan->id,
            $ulasan->user->username,
            $ulasan->buku->judul,
            $ulasan->ulasan,
            $ulasan->rating,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'User',
            'Buku',
            'Ulasan',
            'Rating',
        ];
    }
}
