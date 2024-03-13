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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('countries'); //array
            $table->text('states')->nullable(); //array
            $table->string('states_mode')->default('include'); //include or exclude
            $table->string('method')->default('flat-rate'); //flat-rate | free-shipping | local-pickup
            $table->string("price_type"); //fixed-amount, order-percentage
            $table->string('percentage')->nullable(); //
            $table->text("prices")->nullable(); //
           
            $table->string("warehouse")->nullable(); //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
