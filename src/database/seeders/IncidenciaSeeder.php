<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incidencia;

class IncidenciaSeeder extends Seeder
{
    public function run(): void
    {
        $incidencias = [
            [
                'profesor_id' => 2,
                'aula_id' => 1,
                'dispositivo_id' => 1,
                'descripcion' => 'El ordenador no enciende',
                'estado' => 'pendiente',
                'prioridad' => 'alta',
            ],
            [
                'profesor_id' => 3,
                'aula_id' => 2,
                'dispositivo_id' => 5,
                'descripcion' => 'El proyector no muestra imagen',
                'estado' => 'en_proceso',
                'prioridad' => 'urgente',
            ],
            [
                'profesor_id' => 4,
                'aula_id' => 5,
                'dispositivo_id' => 8,
                'descripcion' => 'La impresora está atascada',
                'estado' => 'resuelta',
                'prioridad' => 'media',
                'solucion' => 'Se ha limpiado el atasco de papel',
                'resuelto_por' => 1,
                'fecha_resolucion' => now(),
            ],
        ];

        foreach ($incidencias as $incidencia) {
            Incidencia::create($incidencia);
        }
    }
}