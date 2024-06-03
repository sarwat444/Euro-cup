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
        Schema::create('doctors_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('specialize_id');
            $table->foreign('specialize_id')->references('id')->on('specializes')->onDelete('cascade');
            $table->double('min_price')->default(0.0);
            $table->double('max_price')->default(0.0);
            $table->string('appointment_examination_reply_time')->nullable();
            $table->integer('urgent_amount')->default(0);
            $table->double('alternative_medicine_price')->default(0.0);
            $table->string('alternative_medicine_reply_time' , 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_infos');
    }
};
