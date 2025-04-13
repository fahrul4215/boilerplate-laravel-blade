<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('slug');
            $table->integer('stock');
            $table->bigInteger('price');
            $table->bigInteger('discount');
            $table->longText('composition');
            $table->integer('weight');
            $table->integer('status');
            $table->longText('description');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category_products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
