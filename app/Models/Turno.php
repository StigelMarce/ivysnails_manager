<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = "turnos";
    protected $fillable = [
        'fecha',
        'horaInicio',
        'horaFin',
        'estado',
        'tipoTurno',
    ];

    public function servicio()
    {
        return $this->hasMany(Servicio::class);
    }

    public function persona()
    {
        return $this->hasMany(Persona::class);
    }

    public function transaccion()
    {
        return $this->hasOne(Transaccion::class);
    }
}