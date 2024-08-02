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
        Schema::create('BookView', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('userID')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('bookID')->references('id')->on('Book')->onDelete('cascade');
            $table->timestamp('viewed_at')->useCurrent();
            $table->unique(['userID', 'bookID']); // Đảm bảo mỗi người dùng chỉ có thể xem mỗi cuốn sách một lần
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BookView');
    }
};
