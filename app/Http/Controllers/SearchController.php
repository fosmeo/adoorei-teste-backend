<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;

class SearchController extends Controller
{
    public function listAllProducts()
    {
        $list_all_products = Product::orderBy('id')->get();
        return response()->json($list_all_products);
    }

    public function listProductID($product_id)
    {
        $list_product_id =  Product::where(['id' => $product_id]) -> get();
        return response()->json($list_product_id);
    }

    public function listAllOrders()
    {   
        $list_all_orders = Order::orderBy('id')->get();       
        return response()->json($list_all_orders);
    }

    public function listOrderStatus($order_status){
        // (order_status OPTIONS - RESERVED/PAID/CANCELED)
        $list_order_status =  Order::where(['order_status'=> $order_status]) -> get();
        return response()->json($list_order_status);
    }

    public function listOrderID($order_id){
        
        $list_order_id =  Order::where(['id' => $order_id]) -> get();

        if ($list_order_id->isEmpty()) {
            echo "Venda inexistente";
            die();
        }
        
        $user_order_id = $list_order_id[0]->user_id;

        $user = User::where(['id' => $user_order_id]) -> get();
        
        $list_order_product_id = OrderProduct::select('id','order_id','product_id','product_amount')->where(['order_id'=>$order_id])->get();
        
        echo $user;
        echo $list_order_id;

        $count = count($list_order_product_id);
        $ind_orderproduct = 0;
        while ($ind_orderproduct < $count) {
            $pushamount = $list_order_product_id[$ind_orderproduct]['product_amount'];
            $list_order_product_id[$ind_orderproduct]->productRelship['product_amount'] = $pushamount;
            echo $list_order_product_id[$ind_orderproduct]->productRelship;            
            $ind_orderproduct++;
        }
    }   
    public function listOrdersUserID($user_id){
        $user = User::select('name','email')->where(['id'=>$user_id])->get();
        
        echo $user;

        $orders = Order::select('id','user_id','order_status','order_total')->where(['user_id'=>$user_id])->get();
                
        $ind_orders = 0;
        $countorders = count($orders);

        while ($ind_orders < $countorders) {
            echo $orders[$ind_orders];           

            $orderproducts = OrderProduct::select('id','order_id','product_id','product_amount')->where(['order_id'=>$orders[$ind_orders]['id']])->get();
            $ind_orderproduct = 0;
            $countproducts = count($orderproducts);

            while ($ind_orderproduct < $countproducts) {
                $pushamount = $orderproducts[$ind_orderproduct]['product_amount'];
                $orderproducts[$ind_orderproduct]->productRelship['product_amount'] = $pushamount;
                echo $orderproducts[$ind_orderproduct]->productRelship;
                $ind_orderproduct++;
            }
            $ind_orders++;
        }
    }

    public function listOrderUserProducts($user_id, $order_id){

        $user = User::select('name','email')->where(['id'=>$user_id])->get();
        
        $orders = Order::select('id','user_id','order_status','order_total')->where(['user_id'=>$user_id, 'id'=>$order_id])->get();
        
        $orderproducts = OrderProduct::select('id','order_id','product_id','product_amount')->where(['order_id'=>$order_id])->get();
        
        echo $user;
        echo $orders;

        $count = count($orderproducts);
        $ind_orderproduct = 0;
        while ($ind_orderproduct < $count) {
            $pushamount = $orderproducts[$ind_orderproduct]['product_amount'];
            $orderproducts[$ind_orderproduct]->productRelship['product_amount'] = $pushamount;
            echo $orderproducts[$ind_orderproduct]->productRelship;            
            $ind_orderproduct++;
        }      
      }
}
