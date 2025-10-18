<?php

namespace App\Http\Controllers\Admin;

use App\Http\controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil ringkasan data
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();

        return view('admin.dashboard', compact('totalProducts', 'totalOrders', 'pendingOrders'));
    }
}
