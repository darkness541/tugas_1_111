<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $kategori_id = $request->get('kategori_id');

        $makanans = Makanan::with('kategori')  // Eager Loading (mencegah N+1 Problem)
            ->when($search, function($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->when($kategori_id, function($query, $kategori_id) {
                return $query->where('kategori_id', $kategori_id);
            })
            ->latest('id')
            ->paginate(10);

        $kategoris = Kategori::all();

        return view('makanan.index', compact('makanans', 'kategoris', 'search', 'kategori_id'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('makanan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'harga'       => 'required|integer|min:0',
            'deskripsi'   => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok'        => 'required|integer|min:0',
        ]);

        Makanan::create($request->all());

        return redirect()->route('makanan.index')
                         ->with('success', 'Menu baru berhasil ditambahkan!');
    }

    public function edit(Makanan $makanan)
    {
        $kategoris = Kategori::all();
        return view('makanan.edit', compact('makanan', 'kategoris'));
    }

    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'harga'       => 'required|integer|min:0',
            'deskripsi'   => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok'        => 'required|integer|min:0',
        ]);

        $makanan->update($request->all());

        return redirect()->route('makanan.index')
                         ->with('success', 'Menu berhasil diupdate!');
    }

    public function destroy(Makanan $makanan)
    {
        $makanan->delete();
        return redirect()->route('makanan.index')
                         ->with('success', 'Menu berhasil dihapus!');
    }

    public function show(Makanan $makanan)
    {
        return view('makanan.show', compact('makanan'));
    }
}