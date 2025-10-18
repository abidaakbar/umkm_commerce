@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Placeholder for product image gallery --}}
            <div class="bg-gray-200 h-96 w-full rounded-md"></div>
            
            <div>
                <h1 class="text-4xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-2xl text-gray-800 font-semibold mb-6">Rp {{ number_format($product->price, 2) }}</p>
                
                <div class="text-gray-600 mb-6">
                    <p>This is a placeholder for the product description. You can add a description field to your products table later.</p>
                </div>

                {{-- Add to Cart Form --}}
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <div class="flex items-center mb-4">
                        <label for="quantity" class="mr-4">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-20 border border-gray-300 rounded-md p-2 text-center">
                    </div>
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
