<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    protected $table = 'pilotos';
    protected $fillable = ['nombre', 'licencia', 'telefono', 'estado'];

    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }
}