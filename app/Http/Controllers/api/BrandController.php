<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Actions\Brand\CreateBrandAction;
use App\Actions\Brand\EditBrandAction;

class BrandController extends Controller
{
    protected $createBrandAction;
    protected $editBrandAction;

    public function __construct(CreateBrandAction $createBrandAction, EditBrandAction $editBrandAction)
    {
        $this->createBrandAction = $createBrandAction;
        $this->editBrandAction = $editBrandAction;
    }

    public function getBrands() {
        $brands = Brand::getBrands();

        return response()->json([
            'brands' => $brands
        ]);
    }

    public function getBrand($id) {
        $brand = Brand::getBrand($id);

        return response()->json([
            'brand' => $brand
        ]);
    }

    public function createBrand(Request $request) {
        return $this->createBrandAction->execute($request);
    }

    public function editBrand(Request $request, $id) {
        return $this->editBrandAction->execute($request, $id);
    }

    public function deleteBrand($id) {
        if(!Brand::where('id', $id)->first()) return response()->json(['error' => 'Brand does not exist!']);

        Brand::where('id', $id)->delete();

        return response()->json([
            'success' => 'Brand is successfully deleted!',          
        ]);

    }
}
