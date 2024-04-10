<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'order_id',
        'product_id',
        'quantity',
        'total_price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
