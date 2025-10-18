<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'qty',
    ];

    /**
     * A cart item belongs to a single cart.
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * A cart item corresponds to a single product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

