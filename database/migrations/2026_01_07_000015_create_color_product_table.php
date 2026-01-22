<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('color_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('color_id')->constrained('colors')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['color_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('color_product');
    }
};
