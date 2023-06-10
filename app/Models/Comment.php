<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_user',
        'body',
        'user_id',
    ];

    public static function createComment($body){
        return Comment::create([
            'name_user' => auth()->user()->name,
            'body' => $body,
            'user_id' => auth()->user()->id,
        ]);
    }
}
