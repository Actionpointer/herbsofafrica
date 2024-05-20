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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string("slug")->nullable();
            $table->string("firstname");
            $table->string("lastname");
            $table->string("email");
            $table->string("phone");
            $table->unsignedBigInteger("country_id");
            $table->unsignedBigInteger("state_id");
            $table->string("city");
            $table->string("street");
            $table->string("postcode");
            $table->boolean("default")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
