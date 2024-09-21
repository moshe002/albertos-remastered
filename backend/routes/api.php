<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use of sanctum middleware sample
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//menu routes
Route::get('menu', [ItemController::class,'index']);
Route::get('menu/create',[ItemController::class,'store']);

//customer routes
Route::get('customers',[CustomerController::class,'index']);
Route::get('customer/create',[CustomerController::class,'store']);
Route::delete('customer/delete/{id}', [CustomerController::class,'destroy']);

//order routes
Route::get('orders', [OrderController::class, 'index']);
Route::get('order/{id}', [OrderController::class, 'show']);
Route::post('order/add', [OrderController::class, 'order']);
//Route::get('order/update',[OrderController::class,'edit']);
//Route::put('order/update',[OrderController::class,'update']);

//order items route
Route::post('items/order', [ItemController::class, 'orderItems']);
Route::get('items/{itemIds}', [ItemController::class, 'getOrderedItems']);