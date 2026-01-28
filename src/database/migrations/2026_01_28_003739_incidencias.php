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
    Schema::create('incidencias', function (Blueprint $table) {
        $table->id(); // Identificador único de la incidencia
        $table->foreignId('profesor_id')->constrained('profesores')->onDelete('cascade'); // Profesor que reporta la incidencia
        $table->foreignId('aula_id')->constrained('aulas'); // Aula donde se produce la incidencia
        $table->foreignId('dispositivo_id')->constrained('dispositivos'); // Dispositivo afectado
        $table->text('descripcion'); // Descripción detallada de la incidencia
        $table->enum('estado', ['pendiente', 'en_proceso', 'resuelta', 'cerrada'])->default('pendiente'); // Estado de la incidencia
        $table->enum('prioridad', ['baja', 'media', 'alta', 'urgente'])->default('media'); // Prioridad de la incidencia
        $table->text('solucion')->nullable(); // Descripción de la solución aplicada
        $table->foreignId('resuelto_por')->nullable()->constrained('profesores'); // Profesor que resolvió la incidencia
        $table->timestamp('fecha_resolucion')->nullable();  
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('incidencias');
    }
};
