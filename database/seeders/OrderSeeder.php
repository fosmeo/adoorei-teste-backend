<?php

namespace Database\Seeders;

use App\Models\Order;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->orderSeeder();
    }

    private function orderSeeder(){

        for ($i=1; $i <= 5; $i++) { 
            Order::create([
                'user_id' => $i,
                'order_status' => 'PG',
                'order_total' => $i*1999.99
            ]);
        }        
    }
}
