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
        Schema::create('member_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Identitas Diri
            $table->string('nik', 16)->nullable();
            $table->string('nia')->nullable()->unique(); // Auto-generated
            $table->string('nama_lengkap');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_hp', 15)->nullable();
            $table->string('foto')->nullable(); // path pas foto
            // Identitas Kampus
            $table->string('npm')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('prodi')->nullable();
            $table->string('angkatan', 4)->nullable(); // tahun angkatan
            // Status keanggotaan
            $table->string('angkatan_makesta')->nullable(); // misal: Makesta Raya 2024
            $table->enum('status_keaktifan', ['aktif', 'non-aktif', 'alumni'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_profiles');
    }
};
