<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\OrderController;

//Auth
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group([
    'middleware' => ['auth:api']
], function () {
    //Auth
    Route::post('profile', [AuthController::class, 'profile']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);
    //Order
    Route::get('getOrder', [OrderController::class, 'getOrder']);

});

//Coffee
Route::post('add', [CoffeeController::class, 'add']);
Route::get('coffee', [CoffeeController::class, 'coffee']);
Route::delete('delete', [CoffeeController::class, 'delete']);
Route::put('update/{id}', [CoffeeController::class, 'update']);
Route::get('coffeeId/{id}', [CoffeeController::class, 'coffeeId']);

//Order
Route::post('order', [OrderController::class, 'order']);
