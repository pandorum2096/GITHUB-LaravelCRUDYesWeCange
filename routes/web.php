<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', ProductController::class);
Route::get('/delete/{id}', [ProductController::class, 'delete']);
Route::post('/create', [ProductController::class, 'store']);
Route::get('/editer/{id}', [ProductController::class, 'show']);
Route::get('/update', [ProductController::class, 'update']);
