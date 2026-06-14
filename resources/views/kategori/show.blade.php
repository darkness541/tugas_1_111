@extends('components.layout')

@section('title', 'Detail Menu')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">🍔 Detail Menu</h1>
            <a href="{{ route('makanan.index') }}" class="text-gray-600 hover:text-gray-800 font-medium">← Kembali</a>
        </div>

        <div class="bg-white rounded-2xl shadow p-8">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-3xl font-bold mb-2">{{ $makanan->nama }}</h2>
                    <span class="inline-block px-4 py-2 text-sm font-medium rounded-full bg-blue-100 text-blue-700">
                        {{ $makanan->kategori->nama ?? 'Tanpa Kategori' }}
                    </span>
                </div>
                <div class="text-right">
                    <p class="text-4xl font-bold text-orange-600">Rp {{ number_format($makanan->harga) }}</p>
                </div>
            </div>

            <div class="mt-8">
                <p class="text-gray-700 leading-relaxed text-lg">
                    {{ $makanan->deskripsi }}
                </p>
            </div>

            <div class="mt-8 grid grid-cols-2 gap-8">
                <div>
                    <p class="text-sm text-gray-500">Stok Tersedia</p>
                    <p class="text-3xl font-semibold {{ $makanan->stok < 10 ? 'text-red-600' : 'text-green-600' }}">
                        {{ $makanan->stok }}
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Dibuat Pada</p>
                    <p class="text-lg">{{ $makanan->created_at->format('d M Y H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('makanan.edit', $makanan) }}"
                class="flex-1 bg-amber-600 hover:bg-amber-700 text-white text-center py-4 rounded-xl font-medium">
                Edit Menu
            </a>
            <form action="{{ route('makanan.destroy', $makanan) }}" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin ingin menghapus menu ini?')"
                    class="w-full bg-red-600 hover:bg-red-700 text-white py-4 rounded-xl font-medium">
                    Hapus Menu
                </button>
            </form>
        </div>
    </div>
@endsection
