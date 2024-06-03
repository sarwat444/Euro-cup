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
        Schema::create('doctors_info_translations', function (Blueprint $table) {
            $table->id();
            $table->text('languages');
            $table->text('address');
            $table->text('details');
            $table->string('locale')->index();
            $table->unsignedBigInteger('doctors_info_id')->index();
            $table->unique(['doctors_info_id','locale']);
            $table->foreign('doctors_info_id')->references('id')->on('doctors_infos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_info_translations');
    }
};
