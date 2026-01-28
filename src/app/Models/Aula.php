<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Aula extends Model
{
    protected $fillable = [
        'nombre',
        'edificio',
        'planta',
        'capacidad',
        'observaciones',
    ];

    // Relación con Dispositivos
    public function dispositivos(): HasMany
    {
        return $this->hasMany(Dispositivo::class);
    }

    // Relación con Incidencias
    public function incidencias(): HasMany
    {
        return $this->hasMany(Incidencia::class);
    }
}