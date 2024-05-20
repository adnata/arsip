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
        Schema::create('arsip_files', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->string('nama_dokumen');
            $table->string('kandungan_informasi');
            $table->string('pembuat')->nullable();
            $table->string('tahun_pembuatan',4);
            $table->string('tahun_kadaluarsa')->nullable();
            $table->string('tags')->nullable();
            $table->integer('total_revisi')->default(0);
            $table->string('versi')->nullable();
            $table->bigInteger('file_size');
            $table->string('bahasa')->nullable();
            $table->foreignId('jenis_dokumen_id')->constrained('jenis_dokumens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_files');
    }
};
