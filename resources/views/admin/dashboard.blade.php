@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>
        <p>Total Produk: {{ $totalProducts }}</p>
        <p>Total Pesanan: {{ $totalOrders }}</p>
        <p>Pesanan Pending: {{ $pendingOrders }}</p>
    </div>
@endsection
