<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/addProduct',[ProductController::class,'store']);
Route::post('/addCategory',[CategoryController::class,'store']);

Route::post('registration',[UserController::class,'registration']);
Route::post('login',[UserController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Add more authenticated routes here
    Route::get('/user', [UserController::class, 'getUser']);
});