<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    protected $fillable = [
        'entrega_id',
        'foto_url',
        'descripcion',
    ];

    public function entrega()
    {
        return $this->belongsTo(Entrega::class);
    }
}