<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    /**
     * A cart belongs to a single user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A cart can have many items in it.
     */
    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}

