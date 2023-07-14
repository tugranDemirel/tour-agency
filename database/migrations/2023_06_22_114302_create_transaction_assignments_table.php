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
        Schema::create('transaction_assignments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_id');
            $table->bigInteger('round_car_id')->nullable();
            $table->bigInteger('city_location_car_price_id');
            $table->bigInteger('round_city_location_car_price_id')->nullable();
            $table->string('name');
            $table->string('passenger_name')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->string('start_date');
            $table->string('round_start_date')->nullable();
            $table->double('price');
            $table->integer('adults_2');
            $table->integer('children_2');
            $table->boolean('child_seat');
            $table->integer('round_adults_2')->nullable();
            $table->integer('round_children_2')->nullable();
            $table->boolean('round_child_seat')->nullable();
            $table->double('return_price')->nullable();
            $table->double('total_price');
            $table->tinyInteger('payment_method')->default(1);
            $table->boolean('status')->default(false);
            $table->boolean('cancel')->default(false);
            $table->string('hotel_name')->nullable();
            $table->string('flight_number')->nullable();
            $table->string('address')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('description')->nullable();
            $table->string('transfer_note')->nullable();
            $table->string('order_note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_assignments');
    }
};
