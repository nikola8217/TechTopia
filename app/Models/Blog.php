<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'img'
    ];

    public static function createBlog($title, $text, $img){
        return Blog::create([
            'title' => $title,
            'body' => $text,
            'img' => '../images/' . $img,
        ]);
    }

    public static function getBlogs() {
        return Blog::all();
    }

    public static function getBlog($id) {
        return Blog::where('id', $id)->first();
    }

    public static function editBlog($id, $title, $text, $img) {
        return Blog::where('id', $id)->update([
            'title' => $title,
            'body' => $text,
            'img' => '../images/' . $img  
        ]);
    }
}
