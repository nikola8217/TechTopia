<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'body',
        'user_id',
    ];

    public static function createComment($body){
        return Comment::create([
            'user_name' => auth()->user()->name,
            'body' => $body,
            'user_id' => auth()->user()->id,
        ]);
    }

    public static function getComments($id) {
        return DB::table("comments")
            ->join('comments_blogs', 'comments_blogs.comment_id', '=', 'comments.id')
            ->select('comments.id as comment_id',
                'comments.body as body',
                'comments.user_id as user_id',
                'comments.user_name as name',
                'comments.created_at as date',
                'comments_blogs.blog_id as blog_id')
            ->where('comments_blogs.blog_id', $id)
            ->get();
    }
}
