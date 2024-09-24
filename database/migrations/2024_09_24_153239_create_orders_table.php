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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('transaction_id');
            $table->integer('room_id');
            $table->integer('user_id');
            $table->string('status');
            $table->string('reference');
            $table->integer('amount');
            $table->dateTime('paid_at');
            $table->string('channel');
            // $table->string('channel');
            $table->string('currency');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
