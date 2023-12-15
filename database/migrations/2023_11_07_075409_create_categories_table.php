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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id');
            $table->string('title');
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->string('form_element1')->nullable();
            $table->string('form_element2')->nullable();
            $table->string('form_element3')->nullable();
            $table->string('form_element4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
