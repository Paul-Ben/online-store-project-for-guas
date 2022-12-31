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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_id');
            $table->string('product_category')->nullable();
            $table->string('product_price');
            $table->string('product_image');
            $table->string('product_stock');
            $table->integer('stock');
            $table->boolean('featured_product')->nullable();
            $table->boolean('recommended_product')->nullable();
            $table->boolean('on_sale')->nullable();
            $table->string('sale_price')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
};
