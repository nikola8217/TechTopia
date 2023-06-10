<?php

namespace App\Actions\Comment;

use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\CommentProduct;
use App\Models\Product;

class CreateCommentProductAction {
    public function execute($request, $product_id)
    {
        $validator = Validator::make($request->all(), [
            'body' => 'required',
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()], 400);
        
        $comment = Comment::createComment($request->body);
        $product = Product::getProduct($product_id);
        $comment_product = CommentProduct::createCommentProduct($comment->id, $product->id);
    
        return response()->json([
            'success' => 'You have successfully leave comment!',
            'comment' => $comment,
            'comment_product' => $comment_product,
        ]);

    }
}