<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function getOrderProducts($id) {
        return DB::table('orders_products')
            ->join('products', 'orders_products.product_id', '=', 'products.id')
            ->where('order_id', $id)
            ->get();
    }

    public static function createOrderProduct($order_id, $product_id, $quantity, $total_price) {
        return OrderProduct::create([
            'order_id' => $order_id,
            'product_id' => $product_id,
            'quantity' => $quantity,
            'total_price' => $total_price,
        ]);
    }
}
