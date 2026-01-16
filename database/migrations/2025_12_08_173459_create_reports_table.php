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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('pet_type');
            $table->string('breed')->nullable();
            $table->string('size');
            $table->string('age');
            $table->text('color_markings')->nullable();
            $table->string('location');
            $table->dateTime('date_time');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('additional_info')->nullable();
            $table->boolean('urgent')->default(false);
            $table->boolean('allow_contact')->default(false);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
