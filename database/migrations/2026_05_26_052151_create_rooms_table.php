<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {

            $table->bigIncrements('ID');

            $table->string('NAME');

            $table->decimal('LATITUDE', 10, 7);

            $table->decimal('LONGITUDE', 10, 7);

            $table->integer('RADIUS');

            $table->timestamp('CREATED_AT')->nullable();

            $table->timestamp('UPDATED_AT')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
