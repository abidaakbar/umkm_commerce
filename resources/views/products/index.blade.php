@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Our Products</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($products as $product)
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
                {{-- Placeholder for product image --}}
                <div class="bg-gray-200 h-48 w-full rounded-md mb-4"></div>
                <h2 class="text-xl font-bold mb-2 flex-grow">{{ $product->name }}</h2>
                <p class="text-gray-600 mb-4">Rp {{ number_format($product->price, 2) }}</p>
                
                {{-- Add to Cart Form --}}
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add to Cart
                    </button>
                </form>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No products available at the moment.</p>
        @endforelse
    </div>
@endsection
