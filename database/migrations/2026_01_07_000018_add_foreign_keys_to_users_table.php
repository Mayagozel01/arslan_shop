<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->nullable()->after('password')->constrained('roles')->onDelete('set null');
            $table->foreignId('cart_id')->nullable()->after('role_id')->constrained('carts')->onDelete('set null');
            $table->foreignId('order_id')->nullable()->after('cart_id')->constrained('orders')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['cart_id']);
            $table->dropForeign(['order_id']);
            $table->dropColumn(['role_id', 'cart_id', 'order_id']);
        });
    }
};
