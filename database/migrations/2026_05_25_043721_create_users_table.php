<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('ID');

            $table->string('USERNAME')->unique();

            $table->string('NAMA');

            $table->string('NIP')->nullable();

            $table->string('PASSWORD')->nullable();

            $table->string('ROLE')->default('user');

            $table->boolean('IS_ACTIVE')->default(true);

            $table->string('SIMGOS_ID')->nullable();

            $table->timestamp('CREATED_AT')->nullable();

            $table->timestamp('UPDATED_AT')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
