<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_style', function (Blueprint $table) {
            $table->id();
            $table->foreignId('style_id')->constrained('styles')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['style_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_style');
    }
};
