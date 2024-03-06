<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;


class OrderController extends Controller
{
    public function ProductNewOrder(Request $request)
    {        
        $user_id = $request->user_id;
        $new_order_verify = Order::where(['user_id'=>$user_id,'order_status'=>'RESERVED'])->get();
        
        if($new_order_verify->isEmpty() ){
            $store = Order::insert(
                [
                   'user_id' => $request -> user_id,
                   'order_status' => 'RESERVED',
                   'order_total' => 0,
                ]);
            echo "Nova venda EM ABERTO";
        }else{
            echo "Venda RESERVADA";
        }
    }

    public function ProductAddProductOrder(Request $request)
    {

        $order_id = $request -> order_id;

        $add_product_order = Order::where(['id'=>$order_id, 'order_status'=>'RESERVED'])->get();
        $add_product = Product::where(['id'=>$request->product_id])->get();

        if($add_product_order->isEmpty()){
            echo " Não Permitido";
        }else{
            // Adiciona o produto
            $store_product = OrderProduct::insert(
            [
                'order_id' => $request -> order_id,
                'product_id' => $request -> product_id,
                'product_amount' => $request -> product_amount,
            ]);
            
            $order_total = $add_product_order[0]['order_total']; 
            $product_price = $add_product[0]['product_price'];
            $add_amount = $request -> product_amount;
            $order_total += $order_total + ($product_price * $add_amount);
   
            // Atualiza o total da venda
            $update_total = Order::where(['id' => $order_id]) -> update(
            [
                'order_total' => $order_total
            ]);
            echo "Produto Adicionado";
        }
    }

    public function ProductPayOrder(Request $request)
    {
        //
    }

     
    public function ProductCancelOrder(Request $request)
    {
        // (order_status OPTIONS - RESERVED/PAID/CANCELED)
        $cancel_order_id = $request -> venda_id;
        $cancel_order_verify = Order::where(['id'=>$cancel_order_id, 'order_status'=>'RESERVED'])->get();
   
        if($cancel_order_verify->isEmpty()){
            echo "ERRO: Venda PAGA/CANCELADA ou INEXISTENTE";
        }else{
            $cancel_order = Order::where(['id' => $cancel_order_id]) -> update(
            [
                'order_status' => 'CANCELED',
            ]);

            echo "Venda CANCELADA";
        }
    }
}
