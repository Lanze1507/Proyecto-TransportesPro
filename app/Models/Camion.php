<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Camion extends Model
{
    protected $table = 'camiones';
    protected $fillable = ['placa', 'modelo', 'capacidad', 'estado'];

    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }
}