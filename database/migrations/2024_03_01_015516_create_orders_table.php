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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments ('id');
            $table->unsignedInteger('user_id');
            $table->string('order_status')->nullable();
            $table->decimal('order_total',10,2)->default(0);
            $table->timestamps();
            // $table->foreign('id')->references('id')->on('orders_products');
            // $table->foreign('user_id')->references('id')->on('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
