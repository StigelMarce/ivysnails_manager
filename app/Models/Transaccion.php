<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = "transacciones";
    protected $fillable = [
        'monto',
        'metodo',
        'tipoTransaccion',
        'estadoTransaccion',
    ];
    public function cuenta() {
        return $this->belongsTo(Cuenta::class);
    }
    public function estadoTransaccion() {
        return $this->hasOne(EstadoTransaccion::class);
    }
    public function turno() {
        return $this->belongsTo(Turno::class);
    }
    public function pago() {
        return $this->hasMany(Pago::class);
    }
}
