@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-lg">
        <h1 class="text-2xl font-bold mb-4">Ubah Status Pesanan</h1>

        <div class="mb-4 p-3 border rounded bg-gray-50">
            <h2 class="font-semibold mb-2">Detail Pesanan</h2>
            <p><strong>Pelanggan:</strong> {{ $order->user->name ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $order->address_text ?? '-' }}</p>
            <ul class="list-disc list-inside mt-2">
                @foreach ($order->items as $item)
                    <li>{{ $item->product->name ?? 'Produk dihapus' }} (x{{ $item->quantity }})</li>
                @endforeach
            </ul>
            <p class="mt-2"><strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
        </div>

        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="status" class="block mb-1 font-semibold">Status Pesanan:</label>
                <select name="status" id="status" class="border rounded px-3 py-2 w-full">
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}" {{ $order->status == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Perubahan</button>
            <a href="{{ route('admin.orders.index') }}" class="ml-2 text-gray-600">Batal</a>
        </form>
    </div>
@endsection
