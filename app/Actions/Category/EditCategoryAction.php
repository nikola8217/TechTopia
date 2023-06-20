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
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()]);
        
        if (Category::where('name', '=', $request->name)->where('id', '!=', $id)->first()) return response()->json(['error' => 'Category already exists!']);

        $category = Category::editCategory($id, $request->name);

        return response()->json([
            'success' => 'Category is successfully updated!',
            'category' => $category            
        ]);
    }
}