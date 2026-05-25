<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::latest('id')->get();
        return view('makanan.index', compact('makanans'));
    }

    // ==================== FITUR CREATE ====================
    public function create()
    {
        return view('makanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'harga'      => 'required|integer|min:0',
            'deskripsi'  => 'required|string',
            'kategori'   => 'required|string',
            'stok'       => 'required|integer|min:0',
        ]);

        Makanan::create($request->all());

        return redirect()->route('makanan.index')
                         ->with('success', 'Menu baru berhasil ditambahkan!');
    }
}