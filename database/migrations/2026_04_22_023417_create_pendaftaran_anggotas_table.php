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
        Schema::create('pendaftaran_anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nisn');
            $table->string('kelas');
            $table->integer('no_hp');
            $table->string('bidang');
            $table->text('pengalaman');
            $table->text('motivasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_anggotas');
    }
};
