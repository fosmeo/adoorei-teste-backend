<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_products', function (Blueprint $table) {
            $table->integer('sale_id'); // chave estrangeira relacionada com 'sale_id' da tabela 'sales'
            $table->integer('product_id'); // chave estrangeira relacionada com 'product_id' da tabela 'products'
            $table->integer('product_amount'); // quantidade vendida
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_products');
    }
};
