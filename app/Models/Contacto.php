<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        'telefono',
        'direccion',
    ];  
    public function persona () {
        return $this->belongsTo(Persona::class);
    }
}
