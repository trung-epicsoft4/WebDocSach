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
        Schema::create('Reviews', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('bookID')->references('id')->on('Book')->onDelete('cascade');
            $table->integer('rating');
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Reviews');
    }
};
