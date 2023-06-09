<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Actions\Category\CreateCategoryAction;
use App\Actions\Category\EditCategoryAction;

class CategoryController extends Controller
{
    protected $createCategoryAction;
    protected $editCategoryAction;

    public function __construct(CreateCategoryAction $createCategoryAction, EditCategoryAction $editCategoryAction)
    {
        $this->createCategoryAction = $createCategoryAction;
        $this->editCategoryAction = $editCategoryAction;
    }

    public function getCategories() {
        $categories = Category::getCategories();

        return response()->json([
            'categories' => $categories
        ]);
    }

    public function createCategory(Request $request) {
        return $this->createCategoryAction->execute($request);
    }

    public function editCategory(Request $request, $id) {
        return $this->editCategoryAction->execute($request, $id);
    }

    public function deleteCategory($id) {
        Category::where('id', $id)->delete();

        return response()->json([
            'success' => 'Category is successfully deleted!',          
        ]);

    }
}
