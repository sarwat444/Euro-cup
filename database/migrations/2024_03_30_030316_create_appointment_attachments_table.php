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
        Schema::create('appointment_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->string('regularly_medications_image')->nullable();
            $table->string('compliant_voice')->nullable();
            $table->text('test_medical_attachment')->nullable();
            $table->text('x_rays_images')->nullable();
            $table->text('radio_graphs_images')->nullable();
            $table->text('cd_reports_images')->nullable();
            $table->string('cd_reports_video')->nullable();
            $table->text('medications_images')->nullable();
            $table->string('medications_voice')->nullable();
            $table->string('voice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_attachments');
    }
};
