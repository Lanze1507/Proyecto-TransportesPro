<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    protected $table = 'viajes';

    protected $fillable = [

        'cliente_id',
        'piloto_id',
        'camion_id',

        'origen',
        'destino',

        'estado',

        'lat_origen',
        'lng_origen',

        'lat_destino',
        'lng_destino'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELACIONES
    |--------------------------------------------------------------------------
    */

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function piloto()
    {
        return $this->belongsTo(Piloto::class);
    }

    public function camion()
    {
        return $this->belongsTo(Camion::class);
    }

    /*
    |--------------------------------------------------------------------------
    | HISTORIAL
    |--------------------------------------------------------------------------
    */

    public function historial()
    {
        return $this->hasMany(ViajeHistorial::class)
            ->latest();
    }
}