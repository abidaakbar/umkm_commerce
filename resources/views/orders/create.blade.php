@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>

    <div class="bg-white rounded-lg shadow-md p-8 max-w-2xl mx-auto">
        <h2 class="text-2xl font-semibold mb-4">Shipping Information</h2>
        
        {{-- Display validation errors if any --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="address" class="block text-gray-700 font-bold mb-2">Full Address</label>
                <textarea id="address" name="address" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('address') }}</textarea>
            </div>

            <div class="mb-6">
                <p class="text-gray-600">Payment method will be Cash on Delivery (COD).</p>
                {{-- You can add other payment options here in the future --}}
            </div>
            
            <div class="text-right">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                    Place Order
                </button>
            </div>
        </form>
    </div>
@endsection
