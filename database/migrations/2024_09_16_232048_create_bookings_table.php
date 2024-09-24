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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
            $table->foreignId('guest_id')->constrained('users')->onDelete('cascade');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->timestamp('booking_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['pending', 'confirmed', 'cancelled']);
            $table->integer('num_guests');
            $table->string('room_type', 50);
            $table->decimal('rate', 10, 2);
            $table->decimal('total_cost', 10, 2);
            $table->string('payment_method', 50);
            $table->enum('payment_status', ['paid', 'pending', 'refunded']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
