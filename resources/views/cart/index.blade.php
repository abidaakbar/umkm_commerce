@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Your Shopping Cart</h1>

    @if ($cart && $cart->items->count() > 0)
        <div class="bg-white rounded-lg shadow-md p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-2">Product</th>
                        <th class="text-center py-2">Quantity</th>
                        <th class="text-right py-2">Price</th>
                        <th class="text-right py-2">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($cart->items as $item)
                        @php $subtotal = $item->product->price * $item->qty; $total += $subtotal; @endphp
                        <tr class="border-b">
                            <td class="py-4">{{ $item->product->name }}</td>
                            <td class="py-4">
                                <form action="{{ route('cart.update', $item) }}" method="POST" class="flex justify-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->qty }}" min="1" class="w-16 text-center border rounded">
                                    <button type="submit" class="ml-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-1 px-2 rounded text-xs">Update</button>
                                </form>
                            </td>
                            <td class="text-right py-4">Rp {{ number_format($item->product->price, 2) }}</td>
                            <td class="text-right py-4">Rp {{ number_format($subtotal, 2) }}</td>
                            <td class="text-right py-4">
                                <form action="{{ route('cart.remove', $item) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-bold">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="text-right mt-6">
                <p class="text-2xl font-bold">Total: Rp {{ number_format($total, 2) }}</p>
                <a href="{{ route('order.create') }}" class="mt-4 inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @else
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <p class="text-gray-500">Your cart is empty.</p>
            <a href="{{ route('products.index') }}" class="mt-4 inline-block text-blue-500 hover:underline">Continue Shopping</a>
        </div>
    @endif
@endsection
