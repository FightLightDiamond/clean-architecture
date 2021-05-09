<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/orders', [\App\Http\Controllers\OrdersController::class, 'indexAction']);

Route::post('/orders', [\App\Http\Controllers\OrdersController::class, 'newAction']);

Route::get('/orders/:id', [\App\Http\Controllers\OrdersController::class, 'viewAction']);

Route::get('/invoice/generate', [\App\Http\Controllers\OrdersController::class, 'viewAction']);
