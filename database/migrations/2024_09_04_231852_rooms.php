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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique();
            $table->string('room_type');
            $table->unsignedBigInteger('room_cat');
            $table->foreign('room_cat')->references('id')->on('room_categories');
            $table->text('description')->nullable();
            $table->decimal('price_per_night', 8, 2);
            $table->integer('capacity');
            $table->string('status')->default('available');
            $table->text('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
