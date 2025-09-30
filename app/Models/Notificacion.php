<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = "notificaciones";
    protected $fillable = [
        "fecha",
        "hora",
        'mensaje',
        'tipoNotificacion',
        'estado',
    ];
    public function persona () {
        return $this->hasMany(Persona::class);
    }
}
