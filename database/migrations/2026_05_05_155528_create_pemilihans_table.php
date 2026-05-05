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
        Schema::create('pemilihans', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Ketua');
            $table->string('Nama_Wakil');
            $table->string('Foto_Ketua')->nullable();
            $table->string('Foto_Wakil')->nullable();
            $table->integer('Jumlah_Suara')->default(0);
            $table->string('Visi')->nullable();
            $table->string('Misi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilihans');
    }
};
