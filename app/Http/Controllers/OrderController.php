<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Order;
use App\Models\OrderProducts;

class OrderController extends Controller
{
    public function orderAdd(Request $request)
    {

        return response()->json($request->all());
        // $list_all_products = Products::select('product_name', 'product_price', 'product_description')->get();
        // return response()->json($list_all_products);
        // $gravar = Depoimentos::insert(
        // [
        //     'id_depoimento' => $id_proximo,
        //     'id_lang' => 1,
        //     'depoimentos_texto' => $request -> depoimento_pt,
        //     'depoimentos_imagem' => $arquivo_novo,
        //     'tab_lang' => 'pt'
        // ]);
    }

}
