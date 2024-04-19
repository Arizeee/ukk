<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriData = [
            ['nama_kategori' => 'Action'],
            ['nama_kategori' => 'Komik'],
            ['nama_kategori' => 'Novel'],
            ['nama_kategori' => 'Romance'],
            ['nama_kategori' => 'Fantasy'],
        ];
        DB::table('kategori')->insert($kategoriData);

    }
}
