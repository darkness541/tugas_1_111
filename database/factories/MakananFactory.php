<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MakananFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->randomElement([
                'Nasi Goreng Spesial', 'Mie Ayam Bakso', 'Ayam Geprek', 
                'Martabak Manis', 'Es Teh Manis', 'Sate Taichan'
            ]),
            'harga' => $this->faker->numberBetween(8000, 35000),
            'deskripsi' => $this->faker->sentence(8),
            'kategori' => $this->faker->randomElement(['Makanan Utama', 'Minuman', 'Camilan', 'Dessert']),
            'stok' => $this->faker->numberBetween(5, 50),
            'gambar' => null,
        ];
    }
}