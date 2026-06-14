<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create([
            'nama' => 'Makanan Utama',
            'deskripsi' => 'Nasi, mie, ayam, ikan dan menu berat lainnya',
            'warna' => 'blue'
        ]);

        Kategori::create([
            'nama' => 'Minuman',
            'deskripsi' => 'Es teh, kopi, jus, milkshake',
            'warna' => 'cyan'
        ]);

        Kategori::create([
            'nama' => 'Camilan',
            'deskripsi' => 'Gorengan, martabak, batagor, dll',
            'warna' => 'amber'
        ]);

        Kategori::create([
            'nama' => 'Dessert',
            'deskripsi' => 'Es krim, puding, cake',
            'warna' => 'pink'
        ]);
    }
}