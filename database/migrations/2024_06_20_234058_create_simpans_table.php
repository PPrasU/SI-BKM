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
        Schema::create('simpans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyimpan');
            $table->string('asal_rt_rw_simpanan');
            $table->bigInteger('simpan');
            $table->bigInteger('ditarik');
            $table->bigInteger('sisa_simpanan');
            $table->date('tanggal_disimpan');
            $table->date('tanggal_ditarik');
            $table->string('status_simpanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simpans');
    }
};
