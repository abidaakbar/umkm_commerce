<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a paginated list of all active products.
     * Allows for searching by name and filtering by category.
     */
    public function index(Request $request)
    {
        // 2. Start building the query for active products
        $query = Product::where('is_active', true);

        // 3. If a search term is provided, filter products by name
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 4. If a category is selected, filter products by that category
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        // 5. Get all categories to pass to the view for the filter dropdown
        $categories = Category::all();

        // 6. Execute the final query, order by newest, and paginate
        $products = $query->latest()->paginate(12)->withQueryString();

        // 7. Return the view with all the necessary data
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
