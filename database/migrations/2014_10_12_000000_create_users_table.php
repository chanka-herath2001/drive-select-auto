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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('role_id')->default(1);
            $table->tinyInteger('status')->default(1);

            $table->string('mobile')->unique()->nullable();
            $table->timestamp('mobile_verified_at')->nullable();

            $table->string('designation')->nullable();

            $table->string('first_name')->nullable();

            $table->string('last_name')->nullable();

            $table->string('gender')->nullable();

            $table->date('birthday')->nullable();

            $table->string('nic')->nullable();

            $table->string('license_plate_number')->nullable();

            // profile picture
            $table->string('avatar')->nullable();
            $table->string('license_side_1')->nullable();
            $table->string('license_side_2')->nullable();
            $table->string('license_plate_number_picture')->nullable();
            $table->string('validation_papers')->nullable();

            $table->rememberToken();
            $table->dateTime('last_login_at')->nullable();


            $table->timestamps();
            $table->softDeletes();
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
