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
            $table->foreignId('category_id')->nullable(); //auto
            $table->foreignId('user_id')->nullable(); //auto
            $table->string('category')->nullable(); //session
            $table->string('year')->nullable(); //session
            $table->string('model')->nullable(); //session
            $table->string('type')->nullable(); //session
            $table->string('title')->nullable(); //form request
            $table->string('form_element1')->nullable(); //form request
            $table->string('form_element2')->nullable(); //form request
            $table->string('form_element3')->nullable(); //form request
            $table->string('form_element4')->nullable(); //form request
            $table->string('desc')->nullable(); //form request
            $table->float('price')->nullable(); //form request
            $table->string('image')->nullable(); //image
            $table->string('adress')->nullable(); //user
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
