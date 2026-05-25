<?php

namespace Database\Seeders;

use App\Models\Makanan;
use Illuminate\Database\Seeder;

class MakananSeeder extends Seeder
{
    public function run(): void
    {
        Makanan::factory(10)->create();
    }
}