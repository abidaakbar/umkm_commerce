@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label>Nama Produk</label>
                <input type="text" name="name" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Harga</label>
                <input type="number" name="price" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Stok</label>
                <input type="number" name="stock" class="border p-2 w-full" required>
            </div>
            <div>
                <label>ID Kategori</label>
                <input type="number" name="category_id" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Status</label>
                <select name="is_active" class="border p-2 w-full" required>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
@endsection
