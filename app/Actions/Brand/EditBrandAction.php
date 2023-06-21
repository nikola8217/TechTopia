<?php

namespace App\Actions\Brand;

use Illuminate\Support\Facades\Validator;
use App\Models\Brand;

class EditBrandAction {
    public function execute($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()]);
        
        if (Brand::where('name', '=', $request->name)->where('id', '!=', $id)->first()) return response()->json(['error' => 'Brand already exists!']);

        $category = Brand::editBrand($id, $request->name);

        return response()->json([
            'success' => 'Brand is successfully updated!',
            'category' => $category            
        ]);
    }
}