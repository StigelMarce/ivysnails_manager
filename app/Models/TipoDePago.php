<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDePago extends Model
{
    protected $table = "tipoDePago";
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function pagos()
    {
        return $this->belongsTo(Pago::class);
    }
}
