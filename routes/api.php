<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CatController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ControllerAuth;
//cat
//localhost:8000/
Route::get('cat',[CatController::class,'all']);
Route::get('cat/show/{id}',[CatController::class,'show']);
Route::post('cat/store',[CatController::class,'store']);
Route::put('cat/update/{id}',[CatController::class,'update']);
Route::delete('cat/delete/{id}',[CatController::class,'delete']);
//book
Route::get('book',[BookController::class,'all']);
//
//auth
//Rigster
Route::post('register',[ControllerAuth::class,'register']);
//login
Route::post('login',[ControllerAuth::class,'login']);
//logout
Route::get('logout',[ControllerAuth::class,'logout']);
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
