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
        Schema::create('Chuong', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('SachID');
            $table->integer('SoChuong');
            $table->string('TieuDe');
            $table->text('NoiDung');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Sach');
    }
};
