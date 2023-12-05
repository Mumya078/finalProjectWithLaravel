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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->float('price')->nullable();
            $table->string('color')->nullable();
            $table->string('category')->nullable();
            $table->string('model')->nullable();
            $table->string('adress')->nullable();
            $table->integer('KM')->nullable();
            $table->integer('HP')->nullable();
            $table->string('year')->nullable();
            $table->boolean('trade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
