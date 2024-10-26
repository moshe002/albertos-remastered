<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use of sanctum middleware sample
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:customer')->post('token/create', [TokenController::class, 'create']);

Route::delete('token/logout', [TokenController::class, 'delete'])->middleware('auth:api');
Route::get('token/verify', [TokenController::class, 'verify']);

//menu routes
Route::get('menu', [ItemController::class, 'index']);
Route::post('menu/create', [ItemController::class, 'store']);

//customer routes
Route::get('customers', [CustomerController::class, 'index']);
//register new customer
Route::post('customer/create', [CustomerController::class, 'store']);
Route::delete('customer/delete/{id}', [CustomerController::class, 'destroy']);

//order routes
Route::get('orders', [OrderController::class, 'index']);
Route::get('order/{id}', [OrderController::class, 'show']);
Route::post('order/add', [OrderController::class, 'order']);

//order items route
Route::post('items/order', [ItemController::class, 'orderItems']);
Route::get('items/{itemIds}', [ItemController::class, 'getOrderedItems']);
