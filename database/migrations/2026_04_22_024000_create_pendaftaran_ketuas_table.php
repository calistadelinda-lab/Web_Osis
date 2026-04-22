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
        Schema::create('pendaftaran_ketuas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nisn');
            $table->string('kelas');
            $table->integer('no_hp');
            $table->string('jabatan');
            $table->text('visi');
            $table->text('misi');
            $table->text('motivasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_ketuas');
    }
};
