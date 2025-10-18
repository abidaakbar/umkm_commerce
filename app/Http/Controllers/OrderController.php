<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Show the checkout page.
     */
    public function create()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();

        // Redirect to cart if it's empty
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('orders.create', compact('cart'));
    }

    /**
     * Store a new order in the database.
     */
    public function store(Request $request)
    {
        $request->validate(['address' => 'required|string|max:1000']);

        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('home')->with('error', 'Cannot proceed with an empty cart.');
        }

        // Use a database transaction to ensure data integrity
        DB::transaction(function () use ($user, $cart, $request) {
            $total = 0;
            // Calculate total price
            foreach ($cart->items as $item) {
                $total += $item->product->price * $item->qty;
            }

            // Create the order
            $order = Order::create([
                'user_id' => $user->id,
                'total' => $total,
                'address_text' => $request->address,
                'status' => 'pending', // Default status
            ]);

            // Move cart items to order items
            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'price' => $item->product->price,
                    'qty' => $item->qty,
                    'subtotal' => $item->product->price * $item->qty,
                ]);
            }

            // Clear the user's cart
            $cart->items()->delete();
        });

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}

