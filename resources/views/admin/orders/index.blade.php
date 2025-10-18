@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Daftar Pesanan</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border">No</th>
                    <th class="py-2 px-4 border">User</th>
                    <th class="py-2 px-4 border">Produk</th>
                    <th class="py-2 px-4 border">Total Harga</th>
                    <th class="py-2 px-4 border">Status</th>
                    <th class="py-2 px-4 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border">{{ $order->user->name ?? '-' }}</td>
                        <td class="py-2 px-4 border">
                            <ul class="list-disc list-inside">
                                @foreach ($order->items as $item)
                                    <li>{{ $item->product->name ?? 'Produk dihapus' }} (x{{ $item->quantity }})</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="py-2 px-4 border">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td class="py-2 px-4 border capitalize">{{ $order->status }}</td>
                        <td class="py-2 px-4 border">
                            <a href="{{ route('admin.orders.edit', $order->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded">Ubah Status</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
