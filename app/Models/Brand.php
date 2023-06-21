<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function getBrands() {
        return Brand::all();
    }

    public static function getBrand($id) {
        return Brand::where('id', $id)->first();
    }

    public static function createBrand($name){
        return Brand::create([
            'name' => $name
        
        ]);
    }

    public static function editBrand($brand_id, $name) {
        return Brand::where('id', $brand_id)->update([
            'name' => $name,  
        ]);
    }
}
