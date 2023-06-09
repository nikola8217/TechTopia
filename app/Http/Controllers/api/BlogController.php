<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Actions\Blog\CreateBlogAction;
use App\Actions\Blog\EditBlogAction;

class BlogController extends Controller
{
    protected $createBlogAction;
    protected $editBlogAction;

    public function __construct(CreateBlogAction $createBlogAction, EditBlogAction $editBlogAction)
    {
        $this->createBlogAction = $createBlogAction;
        $this->editBlogAction = $editBlogAction;
    }

    public function createBlog(Request $request) {
        return $this->createBlogAction->execute($request);
    }

    public function getBlogs() {
        $blogs = Blog::getBlogs();

        return response()->json([
            'blogs' => $blogs
            
        ]);
    }

    public function getBlog($id) {
        $blog = Blog::getBlog($id);
        
        return response()->json([
            'blog' => $blog 
            
        ]);
    }

    public function editBlog(Request $request, $id) {
        return $this->editBlogAction->execute($request, $id);
    }

    public function deleteBlog($id) {
        Blog::where('id', $id)->delete();

        return response()->json([
            'success' => 'Blog is successfully deleted!',          
        ]);
    }
}
