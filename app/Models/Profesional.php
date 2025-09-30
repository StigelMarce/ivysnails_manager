<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profesional extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'especialidad',
        'telefono',
        'email',
        'foto',
        'activo',
        'fecha_ingreso'
    ];

    protected $casts = [
        'activo' => 'boolean',
        'fecha_ingreso' => 'date',
    ];

    // Relación con User (opcional por ahora)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}