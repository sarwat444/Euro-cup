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
        Schema::create('answer_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answer_id');
            $table->string('locale')->index();
            $table->longText('details');
            $table->unique(['answer_id','locale']);
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_translations');
    }
};
