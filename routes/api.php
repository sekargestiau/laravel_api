<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WasteController;

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

// ROUTE AUTENTIKASI
Route::post('login', [AuthenticationController::class,'loginApi']); // http://127.0.0.1:8000/api/login
Route::post('register', [AuthenticationController::class,'registerApi']); // http://127.0.0.1:8000/api/register
Route::get('logout', [AuthenticationController::class,'logoutApi'])->middleware(['auth:sanctum']); // http://127.0.0.1:8000/api/logout

// ROUTE USERS
Route::get('index-user', [UserController::class,'index'])->middleware(['auth:sanctum']); // http://127.0.0.1:8000/api/index
Route::put('update-profile/{id}/update', [UserController::class,'update']); // http://127.0.0.1:8000/api/update-profile  + middleware

// ROUTE COLLECTORS
Route::put('update-currloc/{id}/update', [CollectorController::class,'update']); // http://127.0.0.1:8000/api/update-profile  + middleware
Route::post('update-currloc/{id}/update', [CollectorController::class,'update']); // http://127.0.0.1:8000/api/update-profile  + middleware
Route::get('index', [CollectorController::class,'index']); // http://127.0.0.1:8000/api/update-profile  + middleware

// ROUTE CONTENTS
Route::get('index-content', [ContentController::class,'index']); // http://127.0.0.1:8000/api/index-content
Route::get('contents/{id}', [ContentController::class, 'show']);
Route::put('update-content/{id}/update', [ContentController::class,'update']); // http://127.0.0.1:8000/api/update-profile  + middleware
Route::delete('delete-content/{id}', [ContentController::class, 'destroy']);
Route::post('create-content', [ContentController::class,'store']); // http://127.0.0.1:8000/api/create-content

// ROUTE ORDERS
Route::post('create-order', [OrderController::class,'store']); // http://127.0.0.1:8000/api/register
Route::get('orders/{id}', [OrderController::class,'show'])->middleware(['auth:sanctum']); // http://127.0.0.1:8000/api/index

//create
Route::post('create-waste', [WasteController::class,'store']); // http://127.0.0.1:8000/api/create-waste + middleware
 
//delete
Route::delete('delete-waste/{id}', [WasteController::class,'destroy']); // http://127.0.0.1:8000/api/delete-waste  + middleware 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
