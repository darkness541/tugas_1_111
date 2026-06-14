@extends('components.layout')

@section('title', 'Daftar Menu')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">🍔 Daftar Menu NgabFood</h1>
            <p class="text-gray-600 mt-1">Total Menu: {{ $makanans->count() }}</p>
        </div>
        <a href="{{ route('makanan.create') }}"
            class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-xl font-medium flex items-center gap-2">
            + Tambah Menu Baru
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-4 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-5 text-left font-semibold">Nama Menu</th>
                    <th class="px-6 py-5 text-left font-semibold">Kategori</th>
                    <th class="px-6 py-5 text-right font-semibold">Harga</th>
                    <th class="px-6 py-5 text-center font-semibold">Stok</th>
                    <th class="px-6 py-5 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($makanans as $makanan)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-5 font-medium">{{ $makanan->nama }}</td>

                        <!-- Kategori yang sudah diperbaiki -->
                        <td class="px-6 py-5">
                            @if ($makanan->kategori)
                                <span
                                    class="inline-block px-3 py-1 text-xs font-medium rounded-full 
                                @if ($makanan->kategori->warna) bg-{{ $makanan->kategori->warna }}-100 text-{{ $makanan->kategori->warna }}-700 
                                @else 
                                    bg-blue-100 text-blue-700 @endif">
                                    {{ $makanan->kategori->nama }}
                                </span>
                            @else
                                <span class="text-red-500 text-sm">—</span>
                            @endif
                        </td>

                        <td class="px-6 py-5 text-right font-medium">
                            Rp {{ number_format($makanan->harga) }}
                        </td>
                        <td class="px-6 py-5 text-center">
                            <span class="font-semibold {{ $makanan->stok < 10 ? 'text-red-600' : 'text-green-600' }}">
                                {{ $makanan->stok }}
                            </span>
                        </td>
                        <td class="px-6 py-5 text-center space-x-4">
                            <a href="{{ route('makanan.edit', $makanan) }}"
                                class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                            <a href="{{ route('makanan.show', $makanan) }}"
                                class="text-purple-600 hover:text-purple-800 font-medium">Detail</a>
                            <form action="{{ route('makanan.destroy', $makanan) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus menu ini?')"
                                    class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-16 text-gray-500">
                            Belum ada data menu. Silakan tambahkan menu baru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
