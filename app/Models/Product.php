<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'img',
        'category_id'
    ];

    public static function getProductsByCat() {
        return Product::all();
    }

    public static function createProduct($name, $desc, $price, $img, $category_id){
        return Product::create([
            'name' => $name,
            'description' => $desc,
            'price' => $price,
            'img' => $img,
            'category_id' => $category_id
        
        ]);
    }

    public static function editProduct($id, $name, $desc, $price, $img) {
        return Product::where('id', $id)->update([
            'name' => $name,
            'description' => $desc,
            'price' => $price,
            'img' => $img  
        ]);
    }

    public static function getProduct($id) {
        return Product::where('id', '=', $id)->get();
    }
}
