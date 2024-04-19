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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('buku_id');
            $table->foreign('buku_id')->references('id')->on('buku')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->enum('status_peminjaman', ['Dipinjam','Dikembalikan']);
            $table->string('status_tunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
