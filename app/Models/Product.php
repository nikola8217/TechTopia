<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'discount',
        'price_with_discount',
        'first_img',
        'second_img',
        'category_id',
        'brand_id'
    ];

    public static function getProducts() {
        return Product::all();
    }

    public static function getProductByCategory($id) {
        return DB::table('products')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->select('products.id AS product_id', 
                'products.name AS name', 
                'products.price AS price', 
                'products.discount AS discount', 
                'products.price_with_discount AS price_with_discount', 
                'brands.name AS brand_name')
        ->where('products.category_id', $id)
        ->get();
    }

    public static function getRandomProducts($id) {
        return DB::table('products')->where('id', '<>', $id)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }

    public static function createProduct($name, $price, $discount, $price_with_discount, $first_img, $second_img, $category_id, $brand_id) {
        return Product::create([
            'name' => $name,
            'price' => $price,
            'discount' => $discount,
            'price_with_discount' => $price_with_discount,
            'first_img' => '../images/' . $first_img,
            'second_img' => '../images/' . $second_img,
            'category_id' => $category_id,
            'brand_id' => $brand_id
        
        ]);
    }

    public static function editProduct($id, $name, $price, $discount, $price_with_discount, $first_img, $second_img, $category_id, $brand_id) {
        return Product::where('id', $id)->update([
            'name' => $name,
            'price' => $price,
            'discount' => $discount,
            'price_with_discount' => $price_with_discount,
            'first_img' => '../images/' . $first_img,
            'second_img' => '../images/' . $second_img,
            'category_id' => $category_id,
            'brand_id' => $brand_id
        ]);
    }

    public static function getProduct($id) {
        return Product::where('id', '=', $id)->first();
    }
}
