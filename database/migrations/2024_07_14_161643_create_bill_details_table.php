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
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id');
            $table->string('mobile');
            $table->string('address');
            $table->string('logo');
            $table->string('footer_title');
            $table->string('header_title');
            $table->string('header_subtitle');
            $table->string('footer_subtitle');
            $table->string('printer_size');
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
        Schema::dropIfExists('bill_details');
    }
};
