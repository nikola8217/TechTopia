<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        $blogs = Blog::all();

        // Mapiranje blogova i formatiranje created_at polja
        $formattedBlogs = $blogs->map(function ($blog) {
        return [
            'id' => $blog->id,
            'title' => $blog->title,
            'content' => $blog->content,
            'created_at' => $blog->created_at->format('j F Y'),
            'img' => $blog->img
        ];
    });

    return $formattedBlogs;
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
