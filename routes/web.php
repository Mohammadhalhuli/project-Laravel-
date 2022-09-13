<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware g roup. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Route::middleware('auth')->group(function(){
    Route::get('cat',[CatController::class,'all']);
    Route::get('/cats/show/{id}',[CatController::class,'show']);
    Route::get('/cats/create',[CatController::class,'create']);
    Route::post('/cat/store',[CatController::class,'store']);
    Route::get('/cats/edit/{id}',[CatController::class,'edit']);
    Route::put('/cat/update/{id}',[CatController::class,'update']);
    Route::delete('/cats/delete/{id}',[CatController::class,'delete']);
    //books
    Route::get('books',[BookController::class,'all']);;
    Route::get('/books/show/{id}',[BookController::class,'show']);
    Route::get('/books/create',[BookController::class,'create']);
    Route::post('/book/store',[BookController::class,'store']);
    Route::get('/books/edit/{id}',[BookController::class,'edit']);
    Route::put('/book/update/{id}',[BookController::class,'update']);
    Route::delete('/books/delete/{id}',[BookController::class,'delete']);
});
*/
Route::get('cat',[CatController::class,'all'])->middleware('auth');
Route::get('/cats/show/{id}',[CatController::class,'show'])->middleware('auth');
Route::get('/cats/create',[CatController::class,'create'])->middleware('auth');
Route::post('/cat/store',[CatController::class,'store'])->middleware('auth');
Route::get('/cats/edit/{id}',[CatController::class,'edit'])->middleware('auth');
Route::put('/cat/update/{id}',[CatController::class,'update'])->middleware('auth');
Route::delete('/cats/delete/{id}',[CatController::class,'delete'])->middleware('auth');
//books
Route::get('books',[BookController::class,'all'])->middleware('auth');
Route::get('/books/show/{id}',[BookController::class,'show'])->middleware('auth');
Route::get('/books/create',[BookController::class,'create'])->middleware('auth');
Route::post('/book/store',[BookController::class,'store'])->middleware('auth');
Route::get('/books/edit/{id}',[BookController::class,'edit'])->middleware('auth');
Route::put('/book/update/{id}',[BookController::class,'update'])->middleware('auth');
Route::delete('/books/delete/{id}',[BookController::class,'delete'])->middleware('auth');

//auth
Route::get('register',[AuthController::class,'registerForm'])->middleware('guest');
Route::post('register',[AuthController::class,'register'])->middleware('guest');
//login
Route::get('login',[AuthController::class,'loginForm'])->middleware('guest');
Route::post('login',[AuthController::class,'login'])->middleware('guest');
//logout
Route::get('logout',[AuthController::class,'logout'])->middleware('auth');;
