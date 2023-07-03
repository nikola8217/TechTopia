<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'total_price'
    ];

    protected $table = 'orders_products';

    public static function createOrderProduct($order_id, $product_id, $quantity, $total_price) {
        return OrderProduct::create([
            'order_id' => $order_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'total_price' => $total_price,
        ]);
    }
}
