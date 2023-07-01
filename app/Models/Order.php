<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'status_id',
    ];

    public static function createOrder($name, $email, $phone, $address, $city, $country, $zip, $total_price) {
        return Order::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'zip' => $zip,
            'total_price' => $total_price,
            'status_id' => 1
        ]);
    }
}
