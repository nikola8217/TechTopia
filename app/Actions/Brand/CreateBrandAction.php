<?php

namespace App\Actions\Brand;

use Illuminate\Support\Facades\Validator;
use App\Models\Brand;

class CreateBrandAction {
    public function execute($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
    
        if ($validator->fails()) return response()->json(['error' => $validator->errors()->first()]);
        
        if (Brand::where('name', $request->name)->first()) return response()->json(['error' => 'Brand already exists!']);

        $brand = Brand::createBrand($request->name);

        return response()->json([
            'success' => 'Brand is successfully created!',
            'brand' => $brand            
        ]);
    }
}