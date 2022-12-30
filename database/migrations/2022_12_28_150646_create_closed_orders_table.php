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
        Schema::create('closed_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->string('customer_id');
            $table->string('customer_address')->nullable();
            $table->string('product_name');
            $table->string('product_category');
            $table->string('product_id');
            $table->string('product_price');
            $table->string('product_image');
            $table->string('product_quantity');
            $table->string('order_status');
            $table->string('payment_status');
            $table->string('order_id');
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
        Schema::dropIfExists('closed_orders');
    }
};
