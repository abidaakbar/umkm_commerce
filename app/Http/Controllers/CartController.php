<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    /**
     * Display the user's shopping cart.
     */
    public function index()
    {
        $user = Auth::user();
        // Find the user's cart and load the items and their associated products
        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();

        return view('cart.index', compact('cart'));
    }

    /**
     * Add a product to the shopping cart.
     */
    public function add(Request $request, Product $product)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $user = Auth::user();
        // Find or create a cart for the current user
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        // Check if the item is already in the cart
        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            // If it exists, update the quantity
            $cartItem->increment('qty', $request->quantity);
        } else {
            // If it's a new item, create it
            $cart->items()->create([
                'product_id' => $product->id,
                'qty' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    /**
     * Update the quantity of an item in the cart.
     */
    public function update(Request $request, CartItem $item)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        
        // This functionality will be fully implemented by your teammate.
        // $this->authorize('update', $item);

        $item->update(['qty' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    /**
     * Remove an item from the cart.
     */
    public function remove(CartItem $item)
    {
        // This functionality will be fully implemented by your teammate.
        // $this->authorize('delete', $item);

        $item->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }
}

