<?php

namespace App\Actions\Category;

use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CreateCategoryAction {
    public function execute($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()]);
        
        if (Category::where('name', $request->name)->first()) return response()->json(['error' => 'Category already exists!']);

        $category = Category::createCategory($request->name);

        return response()->json([
            'success' => 'Category is successfully created!',
            'category' => $category            
        ]);
    }
}