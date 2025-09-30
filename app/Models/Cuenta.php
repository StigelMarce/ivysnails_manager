<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $fillable = [ 
        'credito',
        'saldo',
        'fechaActualizacion',
    ];
    public function persona() {
        return $this->belongsTo(Persona::class);
    }
    public function transacciones() {
        return $this->hasMany(Transaccion::class);
    }
}
