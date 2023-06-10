<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Actions\Comment\CreateCommentBlogAction;
use App\Actions\Comment\CreateCommentProductAction;

class CommentController extends Controller
{
    protected $createCommentBlogAction;
    protected $createCommentProductAction;

    public function __construct(CreateCommentBlogAction $createCommentBlogAction, CreateCommentProductAction $createCommentProductAction)
    {
        $this->createCommentBlogAction = $createCommentBlogAction;
        $this->createCommentProductAction = $createCommentProductAction;
    }

    public function createCommentBlog(Request $request, $blog_id) {
        return $this->createCommentBlogAction->execute($request, $blog_id);
    }

    public function createCommentProduct(Request $request, $comment_id) {
        return $this->createCommentProductAction->execute($request, $comment_id);
    }
}
