<?php

namespace App\Actions\Comment;

use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\CommentBlog;
use App\Models\Blog;

class CreateCommentBlogAction {
    public function execute($request, $blog_id)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required',
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()]);
        
        $comment = Comment::createComment($request->body);
        $blog = Blog::getBlog($blog_id);
        $comment_blog = CommentBlog::createCommentBlog($comment->id, $blog->id);
    
        return response()->json([
            'success' => 'You have successfully leave comment!',
            'comment' => $comment,
            'comment_blog' => $comment_blog,
        ]);

    }
}