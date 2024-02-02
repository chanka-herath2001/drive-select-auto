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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('image', 255);
            $table->integer('mileage');
            $table->integer('price');
            $table->string('description', 255);
            $table->string('brand', 255);
            $table->string('model', 255);
            $table->string('transmission', 255);
            $table->string('fuel_type', 255);
            $table->integer('year');
            $table->string('location');
            $table->integer('phone');
            $table->string('email', 255);
            // $table->integer('capacity');
            $table->string('condition');
            //$table->integer('user_id')->unsigned();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
