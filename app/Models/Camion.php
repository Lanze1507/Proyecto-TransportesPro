<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    protected $table = 'camiones';

    protected $fillable = [
        'placa',
        'modelo',
        'capacidad'
    ];

    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }
}