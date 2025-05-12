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
        Schema::create('lembaga_negeris', function (Blueprint $table) {
            $table->id();
            $table->string('rw_rencana_pemb');
            $table->string('lemb_negeri');
            $table->string('detail_pemb');
            $table->date('tanggal_dimulai');
            $table->date('tanggal_selesai');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembaga_negeris');
    }
};
