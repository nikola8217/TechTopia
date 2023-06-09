<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function getCategories() {
        return Category::all();
    }

    public static function createCategory($name){
        return Category::create([
            'name' => $name
        
        ]);
    }

    public static function editCategory($user_id, $name) {
        return Category::where('id', $user_id)->update([
            'name' => $name,  
        ]);
    }
}
