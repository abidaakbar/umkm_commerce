@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
        <p><strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</p>
        <p><strong>Stok:</strong> {{ $product->stock }}</p>
        <p><strong>Kategori ID:</strong> {{ $product->category_id }}</p>
        <p><strong>Status:</strong> {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}</p>

        <a href="{{ route('admin.products.edit', $product->id) }}" class="text-yellow-500">Edit</a> |
        <a href="{{ route('admin.products.index') }}" class="text-blue-500">Kembali</a>
    </div>
@endsection
