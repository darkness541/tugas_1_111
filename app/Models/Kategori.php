<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'warna'
    ];

    public function makanans()
    {
        return $this->hasMany(Makanan::class);
    }
}