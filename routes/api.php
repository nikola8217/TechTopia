<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\BlogController;
use App\Http\Controllers\api\CommentController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('categories', [CategoryController::class, 'getCategories']);
Route::get('products', [ProductController::class, 'getProducts']);
Route::get('products/{id}', [ProductController::class, 'getProduct']);
Route::get('blogs', [BlogController::class, 'getBlogs']);
Route::get('blogs/{id}', [BlogController::class, 'getBlog']);

Route::group(['middleware' => 'jwt.auth'], function () {
    // users
    Route::get('users', [AuthController::class, 'getUsers']);
    Route::get('users/{id}', [AuthController::class, 'getUser']);
    Route::put('users/{id}', [AuthController::class, 'editUser']);
    Route::delete('users/{id}', [AuthController::class, 'deleteUser']);
    // categories 
    Route::post('categories', [CategoryController::class, 'createCategory']);
    Route::put('categories/{id}', [CategoryController::class, 'editCategory']);
    Route::delete('categories/{id}', [CategoryController::class, 'deleteCategory']);
    // products 
    Route::post('products', [ProductController::class, 'createProduct']);
    Route::put('products/{id}', [ProductController::class, 'editProduct']);
    Route::delete('products/{id}', [ProductController::class, 'deleteProduct']);
    // blogs 
    Route::post('blogs', [BlogController::class, 'createBlog']);
    Route::put('blogs/{id}', [BlogController::class, 'editBlog']);
    Route::delete('blogs/{id}', [BlogController::class, 'deleteBlog']);
    // products 
    Route::post('comments/{blog_id}', [CommentController::class, 'createCommentBlog']);
    Route::post('comments/{product_id}', [CommentController::class, 'createCommentProduct']);
   
});

