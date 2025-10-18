@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>

        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Produk</a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 my-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full mt-4 border">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2">Nama</th>
                    <th class="p-2">Harga</th>
                    <th class="p-2">Stok</th>
                    <th class="p-2">Kategori</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-t">
                        <td class="p-2">{{ $product->name }}</td>
                        <td class="p-2">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="p-2">{{ $product->stock }}</td>
                        <td class="p-2">{{ $product->category_id }}</td>
                        <td class="p-2">
                            @if ($product->is_active)
                                <span class="text-green-600 font-semibold">Aktif</span>
                            @else
                                <span class="text-gray-500">Nonaktif</span>
                            @endif
                        </td>
                        <td class="p-2">
                            <a href="{{ route('admin.products.show', $product->id) }}" class="text-blue-500">Lihat</a> |
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-yellow-500">Edit</a> |
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
