<?php

use App\Http\Controllers\Book\BookController;
use App\Http\Controllers\Rent\RentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    //Rotas de livros
    Route::get('/books',[BookController::class,'index']);
    Route::get('/books/show/{id}',[BookController::class,'show']);
    Route::post('/book/create',[BookController::class,'store']);
    Route::put('/book/edit/{id}',[BookController::class,'edit']);
    Route::delete('/book/delete/{id}',[BookController::class,'destroy']);
    //rotas de aluguel
    Route::get('/rent/{id}',[RentController::class,'index']);
    Route::post('/rent/create',[RentController::class,'store']);
});