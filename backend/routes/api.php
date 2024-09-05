<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//use of sanctum middleware sample
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('menu', [ItemController::class,'index']);
Route::get('menu/create',[ItemController::class,'store']);

Route::get('customers',[CustomerController::class,'index']);
Route::get('customer/create',[CustomerController::class,'store']);


