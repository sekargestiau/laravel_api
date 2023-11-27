<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
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

Route::post('login', [AuthenticationController::class,'loginApi']); // http://127.0.0.1:8000/api/login
Route::post('register', [AuthenticationController::class,'registerApi']); // http://127.0.0.1:8000/api/register
Route::get('index', [AuthenticationController::class,'indexApi'])->middleware(['auth:sanctum']); // http://127.0.0.1:8000/api/index
Route::get('logout', [AuthenticationController::class,'logoutApi'])->middleware(['auth:sanctum']); // http://127.0.0.1:8000/api/logout

//create
Route::post('create-waste', [WasteController::class,'store']); // http://127.0.0.1:8000/api/create-waste + middleware
//update
Route::patch('update-waste/{id}', [WasteController::class,'update']); // http://127.0.0.1:8000/api/create-waste  + middleware 
//delete
Route::delete('delete-waste/{id}', [WasteController::class,'destroy']); // http://127.0.0.1:8000/api/delete-waste  + middleware 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
