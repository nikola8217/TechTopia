<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Actions\Product\CreateProductAction;
use App\Actions\Product\EditProductAction;

class ProductController extends Controller
{
    protected $createProductAction;
    protected $editProductAction;

    public function __construct(CreateProductAction $createProductAction, EditProductAction $editProductAction)
    {
        $this->createProductAction = $createProductAction;
        $this->editProductAction = $editProductAction;
    }

    public function getProducts() {
        
        $products = Product::getProductsByCat();
    
        return response()->json($products);
        
    }

    public function getProductsByCategory($id) {
        $products = Product::getProductByCategory($id);

        return response()->json([
            "products" => $products
        ]);
    }

    public function getProduct($id) {
        
        $product = Product::getProduct($id);
        
        return response()->json([
            'product' => $product
        ]);
    
    }

    public function createProduct(Request $request) {
        return $this->createProductAction->execute($request);
    }

    public function editProduct(Request $request, $id) {
        return $this->editProductAction->execute($request, $id);
    }

    public function deleteProduct($id) {
        Product::where('id', $id)->delete();

        return response()->json([
            'success' => 'Product is successfully deleted!',          
        ]);
    }

}
