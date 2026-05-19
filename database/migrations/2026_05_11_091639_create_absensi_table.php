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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('NAMA_DR');
            $table->dateTime('WAKTU_MASUK')->nullable();
            $table->dateTime('WAKTU_KELUAR')->nullable();
            $table->integer('STATUS')->default(0);
            $table->string('koordinat');
            $table->string('ruangan');
            $table->string('token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
