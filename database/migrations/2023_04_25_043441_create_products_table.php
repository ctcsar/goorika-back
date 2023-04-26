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
            $table->integer('userId');
            $table->string('body');
            $table->string('description');
            $table->string('title');
            $table->string('tags');
            $table->integer('position');
            $table->boolean('active');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('eventId');
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
