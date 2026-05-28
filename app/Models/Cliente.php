<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [

    'user_id',

    'nombre',

    'email',

    'telefono',

    'direccion'

];

    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}
}
