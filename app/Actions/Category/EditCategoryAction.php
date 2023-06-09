<?php

namespace App\Actions\Category;

use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class EditCategoryAction {
    public function execute($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()], 400);
        
        if (Category::where('name', $request->name)->first()) return response()->json(['error' => 'Category already exists!'], 400);

        $category = Category::editCategory($id, $request->name);

        return response()->json([
            'success' => 'Category is successfully updated!',
            'category' => $category            
        ]);
    }
}