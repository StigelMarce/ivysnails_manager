<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = "servicios";
    protected $fillable = [
        "nombre",
        "duracion",
        "precio",
        "descuento",
        "descripcion"
    ];
    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}
