<?php

namespace App\Actions\Product;

use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class EditProductAction {
    public function execute($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'first_img' => 'required',
            'second_img' => 'required',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric'
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()]);
        
        if (Product::where('name', '=', $request->name)->where('id', '!=', $id)->first()) return response()->json(['error' => 'Product already exists!']);

        $price_with_discount = $request->price;

        if ($request->discount > 0) {
            $price_with_discount = $request->price - ($request->price * $request->discount/100);
        }

        if (!Category::where('id', $request->category_id)->first()) return response()->json(['error' => 'Category does not exists!']);

        if (!Brand::where('id', $request->brand_id)->first()) return response()->json(['error' => 'Brand does not exists!']);

        $product = Product::editProduct($id, $request->name, $request->price, $request->discount, $price_with_discount, $request->first_img, $request->second_img, $request->category_id, $request->brand_id);

        return response()->json([
            'success' => 'Product is successfully updated!',
            'product' => $product          
        ]);
    }
}