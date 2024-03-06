<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->orderProductSeeder();
    }

    private function orderProductSeeder(){
        
        OrderProduct::create(
            [
                'order_id' => 1,
                'product_id' => 1,
                'product_amount' => 1
            ],
        );

                OrderProduct::create(
            [
                'order_id' => 1,
                'product_id' => 2,
                'product_amount' => 3
            ],
        );
                OrderProduct::create(
            [
                'order_id' => 2,
                'product_id' => 2,
                'product_amount' => 1
            ],
        );
                OrderProduct::create(
            [
                'order_id' => 2,
                'product_id' => 4,
                'product_amount' => 4
            ],
        );
                OrderProduct::create(
            [
                'order_id' => 3,
                'product_id' => 2,
                'product_amount' => 1
            ],
        );
                OrderProduct::create(
            [
                'order_id' => 4,
                'product_id' => 2,
                'product_amount' => 2
            ],
        );

    }    
}
