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
        Schema::create('penguatan_s_d_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('rw');
            $table->string('detail_penguatan_sdm');
            $table->date('tanggal_dilaksanakan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguatan_s_d_m_s');
    }
};
