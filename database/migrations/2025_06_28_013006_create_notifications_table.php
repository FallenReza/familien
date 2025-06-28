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
    Schema::create('notifications', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Untuk siapa notif ini?
        $table->string('message'); // Isi pesan notifikasi
        $table->string('link')->nullable(); // Link untuk diklik (misal: ke detail unit)
        $table->timestamp('read_at')->nullable(); // Kapan notif dibaca? (null jika belum)
        $table->timestamps(); // created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
