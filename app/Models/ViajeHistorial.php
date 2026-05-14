<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViajeHistorial extends Model
{
    protected $fillable = [
        'viaje_id',
        'estado',
        'descripcion'
    ];

    public function viaje()
    {
        return $this->belongsTo(Viaje::class);
    }
}