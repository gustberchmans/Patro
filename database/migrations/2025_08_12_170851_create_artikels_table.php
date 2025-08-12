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
    Schema::create('artikels', function (Blueprint $table) {
        $table->id();
        $table->string('titel');
            $table->string('afbeelding')->nullable(); // opslaan pad/naam op server
            $table->text('content');
            $table->date('publicatiedatum')->nullable();
            $table->timestamps(); // maakt created_at en updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
