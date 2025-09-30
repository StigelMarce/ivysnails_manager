<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preferencia extends Model
{
    protected $table = "preferencias";
    protected $fillable = [
        'modo',
        'notificacionesActivas',
    ];

    public function persona () {
        return $this->belongsTo(Persona::class);
    }
}
