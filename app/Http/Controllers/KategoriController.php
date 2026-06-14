<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $kategoris = Kategori::query()
            ->when($search, function($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);   // Pagination 10 data per halaman

        return view('kategori.index', compact('kategoris', 'search'));
    }

    // Method lain akan ditambahkan di commit berikutnya
}