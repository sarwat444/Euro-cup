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
        Schema::create('specialize_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('specialize_id');
            $table->string('locale')->index();
            $table->text('name');
            $table->unique(['specialize_id','locale']);
            $table->foreign('specialize_id')->references('id')->on('specializes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialize_translations');
    }
};
