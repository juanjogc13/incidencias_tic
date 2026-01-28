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
    Schema::create('profesores', function (Blueprint $table) {
        $table->id(); // Identificador único del profesor
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla de usuarios
        $table->string('nombre'); // Nombre del profesor
        $table->string('apellidos'); // Apellidos del profesor
        $table->string('email')->unique(); // Correo electrónico del profesor
        $table->string('departamento'); // Departamento al que pertenece el profesor
        $table->string('telefono')->nullable(); // Teléfono de contacto del profesor
        $table->boolean('es_coordinador_tde')->default(false); // Indica si el profesor es coordinador TDE
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('profesores');
    }
};
