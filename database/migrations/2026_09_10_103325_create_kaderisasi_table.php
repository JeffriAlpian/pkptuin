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
        Schema::create('kaderisasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Formal: makesta, lakmud, lakut, laknas | Non-formal: latin_1, latin_2
            $table->enum('jenis', ['makesta', 'lakmud', 'lakut', 'laknas', 'latin_1', 'latin_2']);
            $table->enum('status', ['lulus', 'tidak_lulus', 'belum'])->default('belum');
            $table->string('keterangan')->nullable(); // misal: Makesta Raya 2024, Lakmud PC Lampung
            $table->date('tanggal')->nullable();
            $table->string('sertifikat')->nullable(); // path file sertifikat
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaderisasi');
    }
};
