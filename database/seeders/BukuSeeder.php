<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Judul Buku Pertama',
                'sampul' => 'sampul_buku_pertama.jpg',
                'penulis' => 'Penulis Pertama',
                'penerbit' => 'Penerbit Pertama',
                'stockd' => 5,
                'tahun_terbit' => 2020,
                'kategori_id' => 1, // Ganti dengan ID kategori yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Judul Buku Kedua',
                'sampul' => 'sampul_buku_kedua.jpg',
                'penulis' => 'Penulis Kedua',
                'penerbit' => 'Penerbit Kedua',
                'stockd' => 5,
                'tahun_terbit' => 2021,
                'kategori_id' => 2, // Ganti dengan ID kategori yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];
        DB::table('buku')->insert($data);
    }
}
