<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // wie bestelt
            $table->string('product')->default('Pull'); // productnaam
            $table->string('size'); // S, M, L, XL
            $table->string('color'); // kleur
            $table->string('custom_name')->nullable(); // gepersonaliseerde naam
            $table->integer('quantity')->default(1); // aantal
            $table->decimal('price', 8, 2); // prijs
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
