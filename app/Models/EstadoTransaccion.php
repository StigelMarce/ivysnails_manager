<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoTransaccion extends Model
{
    protected $table = "estadoTransaccion";
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function transacciones()
    {
        return $this->belongsTo(Transaccion::class);
    }
}
