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
        Schema::create('alternative_medicine_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->Date('booking_date')->nullable();
            $table->Time('booking_time')->nullable();
            $table->text('meeting_link')->nullable();
            $table->double('payment_amount')->default(0.0);
            $table->enum('payment_status', ['paid', 'pending' , 'cancelled'])->default('pending');
            $table->enum('status', ['completed', 'pending' , 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternative_medicine_orders');
    }
};
