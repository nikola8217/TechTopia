<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'country',
        'zip',
        'total_price',
        'user_id',
        'status_id',
    ];

    public static function getOrders() {
        return DB::table('orders')
            ->join('orders_status', 'orders.status_id', '=', 'orders_status.id')
            ->select('orders.id AS id',
                    'orders.name AS username',
                    'orders.email AS email',
                    'orders.phone AS phone',
                    'orders.address AS address',
                    'orders.city AS city',
                    'orders.country AS country',
                    'orders.zip AS zip',
                    'orders.total_price AS price',
                    'orders.created_at AS createdAt',
                    'orders_status.name')
            ->get();
    }

    public static function getOrder($id) {
        return DB::table('orders')
            ->join('orders_status', 'orders.status_id', '=', 'orders_status.id')
            ->select('orders.id AS id',
                    'orders.name AS username',
                    'orders.email AS email',
                    'orders.phone AS phone',
                    'orders.address AS address',
                    'orders.city AS city',
                    'orders.country AS country',
                    'orders.zip AS zip',
                    'orders.total_price AS price',
                    'orders.created_at AS createdAt',
                    'orders.status_id AS status_id',
                    'orders_status.name')
            ->where('orders.id', $id)
            ->first();
    }

    public static function createOrder($name, $email, $phone, $address, $city, $country, $zip, $total_price, $user_id) {
        return Order::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'zip' => $zip,
            'total_price' => $total_price,
            'user_id' => $user_id,
            'status_id' => 1
        ]);
    }

    public static function changeStatus($id, $status) {
        return Order::where('id', $id)->update([
            'status_id' => $status, 
        ]);
    }
}
