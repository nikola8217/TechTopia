<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Comment\CreateCommentBlogAction;
use App\Models\Comment;
use App\Models\CommentBlog;

class CommentController extends Controller
{
    protected $createCommentBlogAction;

    public function __construct(CreateCommentBlogAction $createCommentBlogAction)
    {
        $this->createCommentBlogAction = $createCommentBlogAction;
    }

    public function getComments($id) {
        $comments = Comment::getComments($id);

        return response()->json([
            "comments" => $comments
        ]);
    }

    public function createCommentBlog(Request $request, $blog_id) {
        return $this->createCommentBlogAction->execute($request, $blog_id);
    }

    public function deleteComment($id) {
        if(!Comment::where('id', $id)->first()) return response()->json(['error' => 'Comment does not exist!']);

        CommentBlog::where('comment_id', $id)->delete();

        Comment::where('id', $id)->delete();

        return response()->json([
            'success' => 'Comment is successfully deleted!',          
        ]);
    }

}
