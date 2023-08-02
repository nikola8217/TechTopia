<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\BlogController;
use App\Http\Controllers\api\CommentController;
use App\Http\Controllers\api\BrandController;
use App\Http\Controllers\api\OrderController;
use App\Http\Controllers\api\EmailController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('categories', [CategoryController::class, 'getCategories']);
Route::get('categories/{id}', [CategoryController::class, 'getCategory']);
Route::get('brands', [BrandController::class, 'getBrands']);
Route::get('brands/{id}', [BrandController::class, 'getBrand']);
Route::get('products', [ProductController::class, 'getProducts']);
Route::get('products/{id}', [ProductController::class, 'getProduct']);
Route::get('randomProducts/{id}', [ProductController::class, 'getRandomProducts']);
Route::get('blogs', [BlogController::class, 'getBlogs']);
Route::get('blogs/{id}', [BlogController::class, 'getBlog']);
Route::post('orders', [OrderController::class, 'createOrder']);
Route::get('orders/{id}', [OrderController::class, 'getOrder']);
Route::get('orderProducts/{id}', [OrderController::class, 'getProductsByOrder']);
Route::get('comments/{blog_id}', [CommentController::class, 'getComments']);
Route::post('sendEmail', [EmailController::class, 'sendEmail']);

Route::group(['middleware' => 'jwt.auth'], function () {
    // users
    Route::get('users', [AuthController::class, 'getUsers']);
    Route::get('users/{id}', [AuthController::class, 'getUser']);
    Route::put('users/{id}', [AuthController::class, 'editUser']);
    Route::put('changePassword/{id}', [AuthController::class, 'changePassword']);
    Route::delete('users/{id}', [AuthController::class, 'deleteUser']);
    Route::get('roles', [AuthController::class, 'getRoles']);
    // categories 
    Route::post('categories', [CategoryController::class, 'createCategory']);
    Route::put('categories/{id}', [CategoryController::class, 'editCategory']);
    Route::delete('categories/{id}', [CategoryController::class, 'deleteCategory']);
     // brands
     Route::post('brands', [BrandController::class, 'createBrand']);
     Route::put('brands/{id}', [BrandController::class, 'editBrand']);
     Route::delete('brands/{id}', [BrandController::class, 'deleteBrand']);
    // products 
    Route::get('productsByCategory/{id}', [ProductController::class, 'getProductsByCategory']);
    Route::post('products', [ProductController::class, 'createProduct']);
    Route::put('products/{id}', [ProductController::class, 'editProduct']);
    Route::delete('products/{id}', [ProductController::class, 'deleteProduct']);
    // blogs 
    Route::post('blogs', [BlogController::class, 'createBlog']);
    Route::put('blogs/{id}', [BlogController::class, 'editBlog']);
    Route::delete('blogs/{id}', [BlogController::class, 'deleteBlog']);
    // products 
    Route::post('comments/{blog_id}', [CommentController::class, 'createCommentBlog']);
    Route::delete('comments/{id}', [CommentController::class, 'deleteComment']);
    // orders
    Route::get('orders', [OrderController::class, 'getOrders']);
    Route::put('changeStatus', [OrderController::class, 'changeStatus']);
    Route::delete('orders/{id}', [OrderController::class, 'deleteOrder']);
    Route::get('ordersUser/{id}', [OrderController::class, 'getOrdersUser']);

});



