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

    public static function getProducts($request) {

        $query = Product::query();

        if (isset($request['sortBy'])) {
            $sortBy = $request['sortBy'];
        
            switch ($sortBy) {
              case 'featured':
                $query = $query->orderByDesc('created_at');
                break;
              case 'az':
                $query = $query->orderBy('name');
                break;
              case 'za':
                $query = $query->orderByDesc('name');
                break;
              case 'lowhigh':
                $query = $query->orderBy('price_with_discount');
                break;
              case 'highlow':
                $query = $query->orderByDesc('price_with_discount');
                break;
              default:
                $query = $query->orderByDesc('created_at');
            }
          }

        if (isset($request['categories'])) $query->whereIn('category_id', $request['categories']);
        
        if (isset($request['brands'])) $query->whereIn('brand_id', $request['brands']);

        if (isset($request['priceFrom'])) $query->where('price', '>=', $request['priceFrom']);

        if (isset($request['priceTo'])) $query->where('price', '<=', $request['priceTo']);

        return $query->get();
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
