<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesor extends Model
{
    protected $table = 'profesores';

    protected $fillable = [
        'user_id',
        'nombre',
        'apellidos',
        'email',
        'departamento',
        'telefono',
        'es_coordinador_tde',
    ];

    protected $casts = [
        'es_coordinador_tde' => 'boolean',
    ];

    // Relación con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Incidencias
    public function incidencias(): HasMany
    {
        return $this->hasMany(Incidencia::class);
    }

    // Incidencias resueltas por este coordinador
    public function incidenciasResueltas(): HasMany
    {
        return $this->hasMany(Incidencia::class, 'resuelto_por');
    }
}