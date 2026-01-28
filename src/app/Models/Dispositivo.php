<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dispositivo extends Model
{
    protected $fillable = [
        'aula_id',
        'tipo',
        'marca',
        'modelo',
        'numero_serie',
        'descripcion',
        'estado',
    ];

    // Relación con Aula
    public function aula(): BelongsTo
    {
        return $this->belongsTo(Aula::class);
    }

    // Relación con Incidencias
    public function incidencias(): HasMany
    {
        return $this->hasMany(Incidencia::class);
    }
}