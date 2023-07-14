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
        Schema::table('city_locations', function (Blueprint $table) {
            $table->integer('order')->default(0)->after('is_airport');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('city_locations', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};
