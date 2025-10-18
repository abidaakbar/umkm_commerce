@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Our Products</h1>

        <!-- Search and Filter Form -->
        <div class="bg-white p-4 rounded-lg shadow-md mb-6">
            <form action="{{ route('products.index') }}" method="GET" class="flex flex-col sm:flex-row items-center gap-4">

                <!-- Search Input -->
                <div class="flex-grow w-full sm:w-auto">
                    <input type="text" name="search" placeholder="Search by product name..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ request('search') }}">
                </div>

                <!-- Category Filter Dropdown -->
                <div class="w-full sm:w-auto">
                    <select name="category_id"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-2">
                    <button type="submit"
                        class="w-full sm:w-auto bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        Search
                    </button>
                    <a href="{{ route('products.index') }}"
                        class="w-full sm:w-auto bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-200 text-center">
                        Reset
                    </a>
                </div>

            </form>
        </div>

        <!-- Product Grid -->
        @if ($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <!-- Placeholder for product image -->
                            <span class="text-gray-500">Image</span>
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h2>
                            <p class="text-gray-600 mt-1">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-4">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit"
                                    class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="mt-8">
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-600 text-lg">No products found matching your criteria.</p>
            </div>
        @endif
    </div>
@endsection
