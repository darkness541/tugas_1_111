@extends('components.layout')

@section('title', 'Daftar Menu')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-bold text-gray-800">🍔 Daftar Menu NgabFood</h1>
            <p class="text-gray-600 mt-1">Total Menu: {{ $makanans->total() }}</p>
        </div>
        <a href="{{ route('makanan.create') }}"
            class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-xl font-medium">
            + Tambah Menu Baru
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-5 py-4 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search & Filter -->
    <form action="{{ route('makanan.index') }}" method="GET" class="mb-8 bg-white p-6 rounded-2xl shadow">
        <div class="flex gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ $search ?? '' }}"
                    placeholder="Cari nama menu atau deskripsi..."
                    class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500">
            </div>
            <div>
                <select name="kategori_id"
                    class="px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-orange-600 text-white px-8 py-3 rounded-xl hover:bg-orange-700">
                🔍 Filter
            </button>
            <a href="{{ route('makanan.index') }}" class="bg-gray-200 hover:bg-gray-300 px-8 py-3 rounded-xl">
                Reset
            </a>
        </div>
    </form>

    <!-- Tabel -->
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
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-5 font-medium">{{ $makanan->nama }}</td>
                        <td class="px-6 py-5">
                            @if ($makanan->kategori)
                                <span class="px-4 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-700">
                                    {{ $makanan->kategori->nama }}
                                </span>
                            @else
                                <span class="text-red-500">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-right font-medium">Rp {{ number_format($makanan->harga) }}</td>
                        <td class="px-6 py-5 text-center font-semibold">{{ $makanan->stok }}</td>
                        <td class="px-6 py-5 text-center space-x-4">
                            <a href="{{ route('makanan.show', $makanan) }}"
                                class="text-purple-600 hover:underline">Detail</a>
                            <a href="{{ route('makanan.edit', $makanan) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('makanan.destroy', $makanan) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus?')"
                                    class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-16 text-gray-500">Tidak ada data menu ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-6 py-5">
            {{ $makanans->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
