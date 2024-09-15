<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table-> string('product_name');
            $table-> string('bar_code');
            $table-> integer('shop_id');
            $table-> string('type');
            $table-> string('image');
            $table-> integer('brand_id');
            $table-> integer('category_id');
            $table-> integer('sub_category_id');
            $table->string('add_by');
            $table->integer('sale_on_hare_price');
            $table->integer('enable_stock_group');
            $table-> timestamps();
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
