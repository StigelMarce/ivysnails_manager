<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
        'monto',
        'fechaPago',
        'estadoPago',
    ];

    public function transaccion() {
        return $this->belongsTo(Transaccion::class);
    }
    public function estadoPago() {
        return $this->belongsTo(EstadoPago::class);
    }
    public function tipoDePago() {
        return $this->belongsTo(TipoDePago::class);
    }
}
