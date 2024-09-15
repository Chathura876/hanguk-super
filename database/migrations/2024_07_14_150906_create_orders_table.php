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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->double('net_total');
            $table->double('pay_amount')->default(0);
            $table->double('balance')->default(0);
            $table->integer('shop_id');
            $table->integer('customer_id');
            $table->string('type');
            $table->date('date');
            $table->string('update_by');
            $table->string('add_by');
            $table->double('return_amount');
            $table->double('discount_amount');
            $table->double('sub_total');
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
        Schema::dropIfExists('orders');
    }
};
