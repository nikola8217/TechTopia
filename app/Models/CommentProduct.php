<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentProduct extends Model
{
    use HasFactory;

    protected $table = 'comments_blogs';

    public static function createCommentProduct($comment_id, $product_id){
        return CommentBlog::create([
            "comment_id" => $comment_id,
            "blog_id" => $product_id 
        ]);
    }
}
