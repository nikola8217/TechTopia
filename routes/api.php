<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('categories', [CategoryController::class, 'getCategories']);

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('categories', [CategoryController::class, 'createCategory']);
    Route::put('categories/{id}', [CategoryController::class, 'editCategory']);
    Route::delete('categories/{id}', [CategoryController::class, 'deleteCategory']);
   
});

