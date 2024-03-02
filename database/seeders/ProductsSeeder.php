<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->productsSeeder();
    }

    private function productsSeeder(){

        for ($i=1; $i < 6; $i++) { 
            Products::create([
                'product_name' => 'Celular - '.$i,
                'product_price' => $i.'999.99',
                'product_description' => 'Descrição - '.$i,
            ]);
        }        
    }
}
