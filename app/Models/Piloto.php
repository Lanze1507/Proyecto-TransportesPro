<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    protected $table = 'pilotos';

    protected $fillable = [
        'user_id',   // ← nuevo: vincula con la cuenta de login
        'nombre',
        'licencia',
        'telefono',
        'dpi',
        'estado',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    // Un piloto pertenece a un usuario del sistema
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un piloto tiene muchos viajes asignados
    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }
}