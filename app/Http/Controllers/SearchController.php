<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProducts;

class SearchController extends Controller
{
    public function listAllProducts()
    {
        $list_all_products = Product::orderBy('id')->get();
        return response()->json($list_all_products);
    }

    public function listProductId($product_id)
    {
        $list_product_id =  Product::where('id', '=', $product_id) -> get();
        return response()->json($list_product_id);
    }

    public function listAllOrders()
    {   
        $list_all_orders = Order::orderBy('id')->get();       
        return response()->json($list_all_orders);
    }

    public function listOrderStatus($order_status){
        $list_order_status =  Order::where('order_status', "=", $order_status) -> get();
        return response()->json($list_order_status);
    }

    public function listOrderId($order_id){
        $list_order_id =  Order::where('id', '=', $order_id) -> get();
        return response()->json($list_order_id);
    }   

}
