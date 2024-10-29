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
        Schema::create('sorteavels', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('secretaria');
            $table->string('local');
            $table->string('matricula')->unique();
            $table->boolean('sorteado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorteavels');
    }
};
