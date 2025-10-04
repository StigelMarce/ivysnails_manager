<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = "sexos";
    protected $fillable = [
        'nombre',
    ];

    public function personas() {
        return $this->hasMany(Persona::class, 'sexo', 'nombre');
    }
}
