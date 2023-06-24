<?php

namespace App\Actions\Blog;

use Illuminate\Support\Facades\Validator;
use App\Models\Blog;

class EditBlogAction {
    public function execute($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'img' => 'required',
            'body' => 'required'
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()]);
        
        if (Blog::where('title', $request->title)->first()) return response()->json(['error' => 'Blog with this title already exists!']);

        $blog = Blog::editBlog($id, $request->title, $request->img, $request->body);

        return response()->json([
            'success' => 'Blog is successfully updated!',
            'blog' => $blog          
        ]);
    }
}