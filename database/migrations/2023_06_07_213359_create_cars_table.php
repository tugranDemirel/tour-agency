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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_model_id')->constrained()->onDelete('cascade');
            $table->json('name');
            $table->json('slug');
            $table->json('color')->nullable();
            $table->string('year')->nullable();
            $table->string('km')->nullable();
            $table->string('image')->nullable();
            $table->string('door')->nullable();
            $table->json('description')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
