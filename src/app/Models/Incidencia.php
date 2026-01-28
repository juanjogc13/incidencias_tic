<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incidencia extends Model
{
    protected $fillable = [
        'profesor_id',
        'aula_id',
        'dispositivo_id',
        'descripcion',
        'estado',
        'prioridad',
        'solucion',
        'resuelto_por',
        'fecha_resolucion',
    ];

    protected $casts = [
        'fecha_resolucion' => 'datetime',
    ];

    // Relación con Profesor
    public function profesor(): BelongsTo
    {
        return $this->belongsTo(Profesor::class);
    }

    // Relación con Aula
    public function aula(): BelongsTo
    {
        return $this->belongsTo(Aula::class);
    }

    // Relación con Dispositivo
    public function dispositivo(): BelongsTo
    {
        return $this->belongsTo(Dispositivo::class);
    }

    // Profesor que resolvió la incidencia
    public function coordinador(): BelongsTo
    {
        return $this->belongsTo(Profesor::class, 'resuelto_por');
    }
}