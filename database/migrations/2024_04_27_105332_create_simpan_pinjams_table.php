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
        Schema::create('simpan_pinjams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('asal_rt_rw');
            $table->bigInteger('pinjam');
            $table->bigInteger('dibayar');
            $table->bigInteger('sisa');
            $table->date('tanggal_pinjam');
            $table->date('tenggat');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpan_pinjams');
    }
};
