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
        Schema::create('city_location_car_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_location_id')->constrained()->onDelete('cascade');
            $table->foreignId('parent_city_location_id')->constrained('city_locations')->onDelete('cascade');
            $table->foreignId('car_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('person_count');
            $table->string('price');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('city_location_car_prices');
    }
};
