@extends('components.layout')

@section('title', 'Detail Menu')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800">🍔 Detail Menu</h1>
            <a href="{{ route('makanan.index') }}"
                class="text-gray-600 hover:text-gray-800 font-medium flex items-center gap-2">
                ← Kembali
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-10">
            <div class="flex justify-between">
                <div>
                    <h2 class="text-4xl font-bold mb-3">{{ $makanan->nama }}</h2>
                    @if ($makanan->kategori)
                        <span
                            class="inline-block px-5 py-2 rounded-full text-sm font-medium 
                            bg-blue-100 text-blue-700">
                            {{ $makanan->kategori->nama }}
                        </span>
                    @endif
                </div>
                <div class="text-right">
                    <p class="text-5xl font-bold text-orange-600">Rp {{ number_format($makanan->harga) }}</p>
                </div>
            </div>

            <div class="mt-10 border-t pt-8">
                <h3 class="font-semibold text-gray-700 mb-3">Deskripsi</h3>
                <p class="text-gray-600 text-lg leading-relaxed">
                    {{ $makanan->deskripsi }}
                </p>
            </div>

            <div class="grid grid-cols-2 gap-10 mt-10">
                <div>
                    <p class="text-gray-500 text-sm">Stok Tersedia</p>
                    <p class="text-4xl font-bold {{ $makanan->stok < 10 ? 'text-red-600' : 'text-green-600' }}">
                        {{ $makanan->stok }}
                    </p>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Ditambahkan Pada</p>
                    <p class="text-xl">{{ $makanan->created_at->format('d F Y H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="mt-8 flex gap-4">
            <a href="{{ route('makanan.edit', $makanan) }}"
                class="flex-1 bg-amber-600 hover:bg-amber-700 text-white py-4 rounded-2xl text-center font-medium">
                ✏️ Edit Menu
            </a>
            <form action="{{ route('makanan.destroy', $makanan) }}" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Yakin ingin menghapus menu ini?')"
                    class="w-full bg-red-600 hover:bg-red-700 text-white py-4 rounded-2xl font-medium">
                    🗑️ Hapus Menu
                </button>
            </form>
        </div>
    </div>
@endsection
