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
        Schema::dropIfExists('absensi');

        Schema::create('absensi', function (Blueprint $table) {

            $table->bigIncrements('ID');

            $table->unsignedBigInteger('USER_ID');

            $table->unsignedBigInteger('ROOM_ID');

            $table->timestamp('WAKTU_MASUK')->nullable();

            $table->timestamp('WAKTU_KELUAR')->nullable();

            $table->string('STATUS')->nullable();

            $table->decimal('LATITUDE', 10, 7)->nullable();

            $table->decimal('LONGITUDE', 10, 7)->nullable();

            $table->integer('ACCURACY')->nullable();

            $table->string('TOKEN')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
