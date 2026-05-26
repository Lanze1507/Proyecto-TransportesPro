<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = [
        'viaje_id',
        'estado',
        'firma_digital',
        'fecha_entrega',
    ];

    public function viaje()
    {
        return $this->belongsTo(Viaje::class);
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class);
    }
}