<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('damage_items', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('stock_id');
            $table->string('product_name');
            $table->date('date');
            $table->integer('quantity');
            $table->string('add_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('damage_items');
    }
};
