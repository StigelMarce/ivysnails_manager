<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recomendacion extends Model
{
    protected $table = "recomendaciones";
    protected $fillable = [
        "tema",
        "mensaje",
    ];
    public function recomendaciones()
    {
        return $this->hasMany(Recomendacion::class);
    }
}
