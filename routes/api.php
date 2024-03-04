<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Test;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('search') -> group(function(){
    Route::get('listallproducts', [SearchController::class, 'listAllProducts']);
    Route::get('product/{product_id}', [SearchController::class, 'listProductId']);  
    
    Route::get('listallorders', [SearchController::class, 'listAllOrders']);
    Route::get('order/{order_id}', [SearchController::class, 'listOrderId']);    

    Route::get('teste/{order_id}', [Test::class, 'teste']);

  });

Route::prefix('order') -> group(function(){
    Route::post('new', [OrderController::class, 'ProductNewOrder']);
    Route::post('add', [OrderController::class, 'ProductAddOrder']);
    Route::delete('remove', [OrderController::class, 'ProductRemoveOrder']);
    Route::post('cancel', [OrderController::class, 'ProductCancelOrder']);
});
