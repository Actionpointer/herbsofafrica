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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("affiliate_id")->nullable();
            $table->string("reference");
            $table->string("stripe_session_id")->nullable();
            $table->string("currency");
            $table->string("amount")->default(0);
            $table->unsignedBigInteger("coupon_id")->nullable();
            $table->string("coupon_value")->default(0);
            $table->string("shipment")->default(0);
            $table->string("total")->default(0);
            $table->string("status")->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
