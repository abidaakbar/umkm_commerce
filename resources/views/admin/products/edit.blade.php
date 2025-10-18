@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label>Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Harga</label>
                <input type="number" name="price" value="{{ $product->price }}" class="border p-2 w-full" required>
            </div>
            <div>
                <label>Stok</label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="border p-2 w-full" required>
            </div>
            <div>
                <label>ID Kategori</label>
                <input type="number" name="category_id" value="{{ $product->category_id }}" class="border p-2 w-full"
                    required>
            </div>
            <div>
                <label>Status</label>
                <select name="is_active" class="border p-2 w-full" required>
                    <option value="1" @if ($product->is_active) selected @endif>Aktif</option>
                    <option value="0" @if (!$product->is_active) selected @endif>Nonaktif</option>
                </select>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Perbarui</button>
        </form>
    </div>
@endsection
