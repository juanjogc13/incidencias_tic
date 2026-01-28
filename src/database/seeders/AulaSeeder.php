<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aula;

class AulaSeeder extends Seeder
{
    public function run(): void
    {
        $aulas = [
            ['nombre' => 'Aula 101', 'edificio' => 'Edificio A', 'planta' => 'Primera', 'capacidad' => 30],
            ['nombre' => 'Aula 102', 'edificio' => 'Edificio A', 'planta' => 'Primera', 'capacidad' => 25],
            ['nombre' => 'Aula 201', 'edificio' => 'Edificio A', 'planta' => 'Segunda', 'capacidad' => 30],
            ['nombre' => 'Aula 202', 'edificio' => 'Edificio A', 'planta' => 'Segunda', 'capacidad' => 28],
            ['nombre' => 'Laboratorio Informática 1', 'edificio' => 'Edificio B', 'planta' => 'Baja', 'capacidad' => 20],
            ['nombre' => 'Laboratorio Informática 2', 'edificio' => 'Edificio B', 'planta' => 'Baja', 'capacidad' => 20],
            ['nombre' => 'Sala Profesores', 'edificio' => 'Edificio A', 'planta' => 'Baja', 'capacidad' => 15],
            ['nombre' => 'Biblioteca', 'edificio' => 'Edificio C', 'planta' => 'Baja', 'capacidad' => 50],
        ];

        foreach ($aulas as $aula) {
            Aula::create($aula);
        }
    }
}