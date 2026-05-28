<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';

    protected $fillable = [

        'nombre',
        'email',
        'telefono',
        'tipo_carga',
        'ciudad_origen',
        'incoterm',
        'peso',
        'alto',
        'ancho',
        'largo',
        'precio_estimado',

    ];
}