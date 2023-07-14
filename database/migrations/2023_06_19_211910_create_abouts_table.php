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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('banner_image')->nullable();
            $table->json('name');
            $table->json('slug');
            $table->json('short_desc');
            $table->json('premium_text');
            $table->json('customer_text');
            $table->json('support_text');
            $table->json('language_text');
            $table->json('accessibility_text');
            $table->json('pet_allow_text');
            $table->json('mission');
            $table->json('vision');
            $table->json('banner_title');
            $table->json('banner_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
