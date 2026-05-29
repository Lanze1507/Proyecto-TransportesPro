<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notificaciones';

    protected $fillable = [
        'titulo',
        'mensaje',
        'leida',
        'role',     // ← a qué rol va dirigida: 'admin', 'operador', etc.
        'viaje_id', // ← opcional: vincula a un viaje específico
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    // Una notificación puede estar vinculada a un viaje
    public function viaje()
    {
        return $this->belongsTo(Viaje::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES — filtros reutilizables
    |--------------------------------------------------------------------------
    */

    // Solo notificaciones no leídas
    public function scopeNoLeidas($query)
    {
        return $query->where('leida', false);
    }

    // Filtrar por rol
    public function scopeParaRol($query, string $role)
    {
        return $query->where('role', $role);
    }
}