<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profesor;
use Illuminate\Support\Facades\Hash;

class ProfesorSeeder extends Seeder
{
    public function run(): void
    {
        // Coordinador TDE
        $userTDE = User::create([
            'name' => 'Juan García',
            'email' => 'coordinador@instituto.es',
            'password' => Hash::make('password'),
        ]);

        Profesor::create([
            'user_id' => $userTDE->id,
            'nombre' => 'Juan',
            'apellidos' => 'García López',
            'email' => 'coordinador@instituto.es',
            'departamento' => 'Informática',
            'telefono' => '666111222',
            'es_coordinador_tde' => true,
        ]);

        // Profesores normales
        $profesores = [
            ['name' => 'María Sánchez', 'nombre' => 'María', 'apellidos' => 'Sánchez Ruiz', 'email' => 'maria@instituto.es', 'departamento' => 'Matemáticas', 'telefono' => '666222333'],
            ['name' => 'Pedro Martínez', 'nombre' => 'Pedro', 'apellidos' => 'Martínez González', 'email' => 'pedro@instituto.es', 'departamento' => 'Lengua', 'telefono' => '666333444'],
            ['name' => 'Ana Fernández', 'nombre' => 'Ana', 'apellidos' => 'Fernández Pérez', 'email' => 'ana@instituto.es', 'departamento' => 'Inglés', 'telefono' => '666444555'],
            ['name' => 'Carlos Rodríguez', 'nombre' => 'Carlos', 'apellidos' => 'Rodríguez Jiménez', 'email' => 'carlos@instituto.es', 'departamento' => 'Ciencias', 'telefono' => '666555666'],
        ];

        foreach ($profesores as $prof) {
            $user = User::create([
                'name' => $prof['name'],
                'email' => $prof['email'],
                'password' => Hash::make('password'),
            ]);

            Profesor::create([
                'user_id' => $user->id,
                'nombre' => $prof['nombre'],
                'apellidos' => $prof['apellidos'],
                'email' => $prof['email'],
                'departamento' => $prof['departamento'],
                'telefono' => $prof['telefono'],
                'es_coordinador_tde' => false,
            ]);
        }
    }
}