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
})->name('well')->middleware('isAdmin');

Auth::routes();

Route::post('/addOrder', [\App\Http\Controllers\OrdersController::class, 'uploadOrder']
)->name('addOrder');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin', [\App\Http\Controllers\OrdersController::class, 'allOrders']
)->name('allData')->middleware('isAdmin');

Route::get('admin/orderVerify/{id}', [\App\Http\Controllers\OrdersController::class, 'orderVerify']
)->name('orderVerify')->middleware('isAdmin');
