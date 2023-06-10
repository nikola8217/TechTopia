<?php

namespace App\Actions\Product;

use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class CreateProductAction {
    public function execute($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'img' => 'required',
            'category_id' => 'required|numeric'
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()], 400);
        
        if (Product::where('name', $request->name)->first()) return response()->json(['error' => 'Product already exists!'], 400);

        $product = Product::createProduct($request->name, $request->description, $request->price, $request->img, $request->category_id);

        return response()->json([
            'success' => 'Product is successfully created!',
            'product' => $product          
        ]);
    }
}