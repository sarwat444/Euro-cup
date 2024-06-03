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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('specialize_id');
            $table->foreign('specialize_id')->references('id')->on('specializes')->onDelete('cascade');
            $table->text('message')->nullable();
            $table->string('full_name' , 500);
            $table->enum('gender', ['male', 'female']);
            $table->enum('breastfeeding_status', ['pregnant' , 'breastfeeding' , 'not_breastfeeding'])->nullable();
            $table->integer('age');
            $table->integer('height')->default(0);
            $table->integer('weight')->default(0);
            $table->string('country' , 100);
            $table->string('nationality' , 100)->nullable();
            $table->string('phone_number' , 100);
            $table->string('email' , 100)->nullable();
            $table->string('work')->nullable();
            $table->boolean('is_smoker')->default(0);
            $table->boolean('drink_alcohol')->default(0);
            $table->boolean('medications_allergy')->default(0);
            $table->text('allergy_medications_names')->nullable();
            $table->boolean('had_surgeries')->default(0);
            $table->text('surgeries_names')->nullable();
            $table->boolean('had_hereditary_diseases')->default(0);
            $table->text('hereditary_diseases_names')->nullable();
            $table->boolean('take_medications_regularly')->default(0);
            $table->text('compliant')->nullable();
            $table->text('taking_medications')->nullable();
            $table->boolean('urgent')->default(0);
            $table->integer('meeting_id')->nullable();
            $table->timestamp('meeting_date')->nullable();
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
        Schema::dropIfExists('appointments');
    }
};
