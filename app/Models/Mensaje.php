<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = "mensajes";
    protected $fillable = [
        'contenido',
        'fecha',
        'hora',
        'contenido',
        'estado',
    ];

    public function persona () {
        return $this->belongsTo(Persona::class);
    }
}
