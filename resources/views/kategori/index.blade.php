@extends('components.layout')

@section('title', 'Daftar Kategori')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">📂 Daftar Kategori</h1>
        <a href="{{ route('kategori.create') }}"
            class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-xl font-medium">
            + Tambah Kategori
        </a>
    </div>

    <!-- Search -->
    <form action="{{ route('kategori.index') }}" method="GET" class="mb-6">
        <div class="flex gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kategori..."
                class="flex-1 px-5 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-orange-500">
            <button type="submit" class="bg-gray-800 text-white px-8 py-3 rounded-xl hover:bg-gray-900">
                🔍 Cari
            </button>
            @if (request('search'))
                <a href="{{ route('kategori.index') }}" class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">
                    Reset
                </a>
            @endif
        </div>
    </form>

    <div class="bg-white rounded-2xl shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-5 text-left">Nama Kategori</th>
                    <th class="px-6 py-5 text-left">Deskripsi</th>
                    <th class="px-6 py-5 text-center">Jumlah Menu</th>
                    <th class="px-6 py-5 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($kategoris as $kategori)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-5 font-medium">{{ $kategori->nama }}</td>
                        <td class="px-6 py-5 text-gray-600">{{ Str::limit($kategori->deskripsi, 80) }}</td>
                        <td class="px-6 py-5 text-center">
                            <span class="bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm font-medium">
                                {{ $kategori->makanans->count() }} Menu
                            </span>
                        </td>
                        <td class="px-6 py-5 text-center space-x-4">
                            <a href="{{ route('kategori.show', $kategori) }}"
                                class="text-blue-600 hover:underline">Detail</a>
                            <a href="{{ route('kategori.edit', $kategori) }}"
                                class="text-amber-600 hover:underline">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    onclick="return confirm('Yakin hapus kategori ini? Semua menu di dalamnya juga akan terhapus!')"
                                    class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-12 text-gray-500">Belum ada kategori</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="px-6 py-4">
            {{ $kategoris->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
