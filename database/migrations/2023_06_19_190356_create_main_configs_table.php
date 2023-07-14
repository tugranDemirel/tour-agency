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
        Schema::create('main_configs', function (Blueprint $table) {
            $table->id();
            $table->string('filter_image')->default('https://turcotravel.com/images/tours/2416galata-tower-istanbul-best-of-tour-2-days.jpg');
            $table->integer('price')->default(38);
            $table->json('price_description');
            $table->json('video_title');
            $table->json('video_description');
            $table->string('video_url');
            $table->string('video_image');
            $table->json('premium_text');
            $table->json('customer_text');
            $table->json('support_text');
            $table->string('laptop_image')->default('https://hips.hearstapps.com/vidthumb/images/1-1652801501.jpg?crop=1.00xw:1.00xh;0,0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_configs');
    }
};
