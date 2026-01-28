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
    Schema::create('dispositivos', function (Blueprint $table) {
        $table->id(); // Identificador único del dispositivo
        $table->foreignId('aula_id')->constrained()->onDelete('cascade'); // Aula donde se encuentra el dispositivo
        $table->string('tipo'); // Ej: "Portátil", "Proyector", "Impresora"
        $table->string('marca')->nullable(); // Ej: "Dell", "Epson"
        $table->string('modelo')->nullable(); // Ej: "Inspiron 15", "PowerLite X39"
        $table->string('numero_serie')->unique()->nullable(); // Número de serie del dispositivo
        $table->text('descripcion')->nullable(); // Descripción adicional del dispositivo 
        $table->enum('estado', ['operativo', 'averiado', 'en_reparacion', 'baja'])->default('operativo'); // Estado del dispositivo
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('dispositivos');
    }
};
