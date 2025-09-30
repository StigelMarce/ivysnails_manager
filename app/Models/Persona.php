<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "personas";
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'edad',
        'sexo',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
    public function preferencias () {
        return $this->hasOne(Preferencia::class);
    }
    public function mensajes () {
        return $this->hasMany(Mensaje::class);
    }

    public function turnos () {
        return $this->hasMany(Turno::class);
    }

    public function recomendaciones () {
        return $this->hasMany(Recomendacion::class);
    }

    public function servicios () {
        return $this->hasMany(Servicio::class);
    }

    public function cuenta () {
        return $this->hasOne(Cuenta::class);
    }

    public function notificaciones () {
        return $this->hasMany(Notificacion::class);
    }
    public function contactos () {
        return $this->hasOne(Contacto::class);
    }
}
