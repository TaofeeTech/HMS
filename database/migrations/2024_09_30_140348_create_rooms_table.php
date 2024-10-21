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
            $table->bigIncrements('id');
            $table->string('room_number')->unique();
            $table->unsignedBigInteger('room_category_id');
            $table->string('type');
            $table->integer('capacity');
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->boolean('is_available')->default(true);
            $table->integer('size')->nullable();  // Optional: Size of the room
            $table->string('image')->nullable();  // Optional: Image of the room
            $table->json('features')->nullable(); // Optional: JSON field for room features
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraint
            $table->foreign('room_category_id')->references('id')->on('room_categories')->onDelete('cascade');
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
