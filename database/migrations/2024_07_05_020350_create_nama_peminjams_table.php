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
        Schema::create('nama_peminjams', function (Blueprint $table) {
            $table->id();
            $table->string('namaKSM');
            $table->string('anggotaKSM');
            $table->string('alamat');
            $table->date('tanggal_pencairan');
            $table->bigInteger('saldo_pinjaman');
            $table->bigInteger('tunggakan_<3bulan');
            $table->bigInteger('tunggakan_>3bulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nama_peminjams');
    }
};
