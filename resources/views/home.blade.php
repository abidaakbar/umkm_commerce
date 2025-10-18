@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to Our UMKM Store!</h1>
        <p class="text-lg text-gray-600 mb-8">Discover amazing products from local businesses.</p>
        <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Browse All Products
        </a>
    </div>

@endsection
