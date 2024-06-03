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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('code_country',50)->nullable();
            $table->string('mobile', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_validation')->default(0);
            $table->boolean('is_active')->default(0);
            $table->string('password');
            $table->integer('country_id');
            $table->string('city' , 255)->nullable();
            $table->string('plz_code' ,50)->nullable();
            $table->string('street' , 255)->nullable();
            $table->string('image' , 100)->nullable();
            $table->string('validation_code', 255)->nullable();
            $table->integer('try_num_validation')->default(0);
            $table->timestamp('last_send_validation_code')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('user_type', ['user', 'doctor']);
            $table->longText('device_token',)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
