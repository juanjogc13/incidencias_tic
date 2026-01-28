<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dispositivo;

class DispositivoSeeder extends Seeder
{
    public function run(): void
    {
        $dispositivos = [
            // Aula 101
            ['aula_id' => 1, 'tipo' => 'Ordenador', 'marca' => 'Dell', 'modelo' => 'OptiPlex 7090', 'numero_serie' => 'DEL001', 'estado' => 'operativo'],
            ['aula_id' => 1, 'tipo' => 'Proyector', 'marca' => 'Epson', 'modelo' => 'EB-X06', 'numero_serie' => 'EPS001', 'estado' => 'operativo'],
            ['aula_id' => 1, 'tipo' => 'Altavoces', 'marca' => 'Logitech', 'modelo' => 'Z200', 'numero_serie' => 'LOG001', 'estado' => 'operativo'],
            
            // Aula 102
            ['aula_id' => 2, 'tipo' => 'Ordenador', 'marca' => 'HP', 'modelo' => 'ProDesk 400', 'numero_serie' => 'HP001', 'estado' => 'operativo'],
            ['aula_id' => 2, 'tipo' => 'Proyector', 'marca' => 'BenQ', 'modelo' => 'MH535', 'numero_serie' => 'BEN001', 'estado' => 'averiado'],
            
            // Lab Informática 1
            ['aula_id' => 5, 'tipo' => 'Ordenador', 'marca' => 'Lenovo', 'modelo' => 'ThinkCentre M720', 'numero_serie' => 'LEN001', 'estado' => 'operativo'],
            ['aula_id' => 5, 'tipo' => 'Ordenador', 'marca' => 'Lenovo', 'modelo' => 'ThinkCentre M720', 'numero_serie' => 'LEN002', 'estado' => 'operativo'],
            ['aula_id' => 5, 'tipo' => 'Impresora', 'marca' => 'HP', 'modelo' => 'LaserJet Pro', 'numero_serie' => 'HP002', 'estado' => 'en_reparacion'],
            ['aula_id' => 5, 'tipo' => 'Switch', 'marca' => 'Cisco', 'modelo' => 'Catalyst 2960', 'numero_serie' => 'CIS001', 'estado' => 'operativo'],
            
            // Lab Informática 2
            ['aula_id' => 6, 'tipo' => 'Ordenador', 'marca' => 'Dell', 'modelo' => 'OptiPlex 3080', 'numero_serie' => 'DEL002', 'estado' => 'operativo'],
            ['aula_id' => 6, 'tipo' => 'Ordenador', 'marca' => 'Dell', 'modelo' => 'OptiPlex 3080', 'numero_serie' => 'DEL003', 'estado' => 'averiado'],
            ['aula_id' => 6, 'tipo' => 'Proyector', 'marca' => 'Epson', 'modelo' => 'EB-X41', 'numero_serie' => 'EPS002', 'estado' => 'operativo'],
            
            // Sala Profesores
            ['aula_id' => 7, 'tipo' => 'Impresora', 'marca' => 'Canon', 'modelo' => 'PIXMA G6050', 'numero_serie' => 'CAN001', 'estado' => 'operativo'],
            ['aula_id' => 7, 'tipo' => 'Ordenador', 'marca' => 'HP', 'modelo' => 'EliteDesk 800', 'numero_serie' => 'HP003', 'estado' => 'operativo'],
        ];

        foreach ($dispositivos as $dispositivo) {
            Dispositivo::create($dispositivo);
        }
    }
}