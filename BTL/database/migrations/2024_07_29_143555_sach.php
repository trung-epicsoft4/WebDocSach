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
        Schema::create('Sach', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('TenSach')->unique();
            $table->string('TacGia');
            $table->year('NamXuatBan');
            $table->integer('DanhMucID');
            $table->text('MoTa');
            $table->string('HinhAnh');
            $table->integer('KichHoat');
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
