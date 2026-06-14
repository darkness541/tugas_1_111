@extends('components.layout')

@section('title', 'Edit Kategori')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">✏️ Edit Kategori</h1>
            <a href="{{ route('kategori.index') }}" class="text-gray-600 hover:text-gray-800">← Kembali</a>
        </div>

        <form action="{{ route('kategori.update', $kategori) }}" method="POST" class="bg-white rounded-2xl shadow p-8">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" name="nama" value="{{ old('nama', $kategori->nama) }}"
                        class="w-full px-5 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                        class="w-full px-5 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500">
                        {{ old('deskripsi', $kategori->deskripsi) }}
                    </textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Warna Badge (Opsional)</label>
                    <input type="text" name="warna" value="{{ old('warna', $kategori->warna) }}"
                        placeholder="contoh: blue, red, emerald, amber"
                        class="w-full px-5 py-4 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500">
                </div>
            </div>

            <div class="mt-10 flex gap-4">
                <button type="submit"
                    class="flex-1 bg-orange-600 hover:bg-orange-700 text-white font-medium py-4 rounded-xl">
                    Update Kategori
                </button>
                <a href="{{ route('kategori.index') }}"
                    class="flex-1 text-center border border-gray-300 hover:bg-gray-50 py-4 rounded-xl">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
