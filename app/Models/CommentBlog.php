<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    use HasFactory;

    protected $table = 'comments_blogs';

    public static function createCommentBlog($comment_id, $blog_id){
        return CommentBlog::create([
            "comment_id" => $comment_id,
            "blog_id" => $blog_id 
        ]);
    }
}
