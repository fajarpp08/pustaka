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
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('buku_id')->references('id')->on('bukus')->onDelete('SET DEFAULT');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET DEFAULT');
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
