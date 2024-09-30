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
        Schema::create('grn_bills', function (Blueprint $table) {
            $table->id();
            $table->double('total');
            $table->double('net_total');
            $table->double('discount');
            $table->double('balance');
            $table->string('company_name');
            $table->date('date');
            $table->string('payment_type');
            $table->string('add_by');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grn_bills');
    }
};
