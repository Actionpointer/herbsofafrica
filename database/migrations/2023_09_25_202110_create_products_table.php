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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug")->nullable();
            $table->mediumText("introduction");
            $table->longText("description")->nullable();
            $table->longtext("key_features")->nullable();
            $table->longText('ingredients')->nullable();
            $table->longText('faqs')->nullable();
            $table->string('download_link')->nullable();
            $table->longText("image")->nullable();
            $table->json("prices");
            $table->unsignedBigInteger('category_id');
            $table->text('tags')->nullable();
            $table->integer('stock')->default(1);
            $table->boolean('published')->default(1);
            $table->boolean('featured')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
