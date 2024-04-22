<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BukuExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Buku::with('kategori')->get();
    }

    public function map($buku): array
    {
        $stock = $buku->stock > 0 ? $buku->stock : 'Stock Kosong';
        return [
            $buku->id,
            $buku->judul,
            $buku->penulis,
            $buku->penerbit,
            $stock,
            $buku->tahun_terbit,
            $buku->kategori->nama_kategori,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Judul',
            'Penulis',
            'Penerbit',
            'stock',
            'Tahun terbit',
            'Kategori',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['argb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['argb' => '3366FF'],
                    ],
                ]);
            },
        ];
    }
}
