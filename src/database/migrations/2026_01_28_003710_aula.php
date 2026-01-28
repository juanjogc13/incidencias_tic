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
        Schema::create('aulas', function (Blueprint $table) {
            $table->id(); // Identificador único del aula
            $table->string('nombre'); // Nombre o código del aula
            $table->string('edificio')->nullable(); // Edificio donde se encuentra el aula
            $table->string('planta')->nullable(); // Planta del edificio
            $table->integer('capacidad')->nullable(); // Capacidad del aula
            $table->text('observaciones')->nullable(); // Observaciones adicionales sobre el aula
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};