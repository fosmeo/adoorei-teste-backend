<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;


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
    
    /*Routes PRODUCTS (ALL/productID)*/
    Route::get('list_all_products', [SearchController::class, 'listAllProducts']);
    Route::get('list_product_id/{product_id}', [SearchController::class, 'listProductID']);   
       
    /*Routes ORDERS (ALL/orderStatus/orderID/userID/userID+productsID) */
    Route::get('list_all_orders', [SearchController::class, 'listAllOrders']);
    Route::get('list_order_status/{order_status}', [SearchController::class, 'listOrderStatus']);
    Route::get('list_order_id/{order_id}', [SearchController::class, 'listOrderID']);
    Route::get('list_orders_user_id/{userid}', [SearchController::class, 'listOrdersUserID']);
    Route::get('list_order_user_products/{userid}/{orderid}', [SearchController::class, 'listOrderUserProducts']);

  });

Route::prefix('order') -> group(function(){
    Route::post('new_order', [OrderController::class, 'ProductNewOrder']);
    Route::post('add_product', [OrderController::class, 'ProductAddProductOrder']);
    Route::delete('pay_order', [OrderController::class, 'ProductPayOrder']);
    Route::post('cancel_order', [OrderController::class, 'ProductCancelOrder']);
});
