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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->foreignId('buku_id');
            $table->foreignId('user_id');
            $table->boolean('status_kembali')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
