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
        Schema::create('abdimas', function (Blueprint $table) {
            $table->id();
            $table->string('asal_rw');
            $table->string('kategori_pemberdayaan');
            $table->string('detail_kegiatan');
            $table->date('tanggal_dilakukan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abdimas');
    }
};
