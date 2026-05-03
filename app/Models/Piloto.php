<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    protected $table = 'pilotos';

    protected $fillable = [
        'nombre',
        'licencia',
        'telefono',
        'estado',
    ];

    // Relación: un piloto tiene muchos viajes
    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }
}