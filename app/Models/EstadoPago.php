<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoPago extends Model
{
    protected $table = "estadoPago";
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function pagos()
    {
        return $this->belongsTo(Pago::class);
    }
}