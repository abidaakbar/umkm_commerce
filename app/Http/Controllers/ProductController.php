<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Start with a query for active products
        $query = Product::where('is_active', true);

        // If a search term is provided, filter products by name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        // Get the filtered products, ordered by the newest first, and paginate them
        $products = $query->latest()->paginate(12); // Show 12 products per page

        return view('products.index', compact('products'));
    }
    
    public function show(Product $product)
    {
        // The product is automatically fetched by Laravel's route model binding
        return view('products.show', compact('product'));
    }
}

