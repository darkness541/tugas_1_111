@extends('components.layout')

@section('title', 'Edit Menu')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Edit Menu</h1>
            <a href="{{ route('makanan.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">
                ← Kembali
            </a>
        </div>

        <form action="{{ route('makanan.update', $makanan) }}" method="POST" class="bg-white rounded-2xl shadow p-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Menu</label>
                    <input type="text" name="nama" value="{{ old('nama', $makanan->nama) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500"
                        required>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga', $makanan->harga) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Stok</label>
                        <input type="number" name="stok" value="{{ old('stok', $makanan->stok) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500"
                            required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="kategori"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500"
                        required>
                        <option value="Makanan Utama"
                            {{ old('kategori', $makanan->kategori) == 'Makanan Utama' ? 'selected' : '' }}>Makanan Utama
                        </option>
                        <option value="Minuman" {{ old('kategori', $makanan->kategori) == 'Minuman' ? 'selected' : '' }}>
                            Minuman</option>
                        <option value="Camilan" {{ old('kategori', $makanan->kategori) == 'Camilan' ? 'selected' : '' }}>
                            Camilan</option>
                        <option value="Dessert" {{ old('kategori', $makanan->kategori) == 'Dessert' ? 'selected' : '' }}>
                            Dessert</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500" required>
                        {{ old('deskripsi', $makanan->deskripsi) }}
                    </textarea>
                </div>
            </div>

            <div class="mt-8 flex gap-4">
                <button type="submit"
                    class="flex-1 bg-orange-600 hover:bg-orange-700 text-white font-medium py-4 rounded-xl transition">
                    Update Menu
                </button>
                <a href="{{ route('makanan.index') }}"
                    class="flex-1 border border-gray-300 hover:bg-gray-50 text-center font-medium py-4 rounded-xl transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
