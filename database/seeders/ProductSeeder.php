<?php

namespace Database\Seeders;

use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->productSeeder();
    }

    private function productSeeder(){

        for ($i=1; $i <= 5; $i++) { 
            Product::create([
                'product_name' => 'Celular - '.$i,
                'product_price' => $i.'999.99',
                'product_description' => 'Descrição - '.$i,
            ]);
        }        
    }
}
