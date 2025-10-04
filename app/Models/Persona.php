<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Persona extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table = "personas";
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'fecha_nacimiento',
        'foto',
        'especialidad',
        'activo',
        'sexo',
        'user',
    ];

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user','id');
    }
    public function preferencias()
    {
        return $this->hasOne(Preferencia::class);
    }
    public function mensajes()
    {
        return $this->hasMany(Mensaje::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }

    public function recomendaciones()
    {
        return $this->hasMany(Recomendacion::class);
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class);
    }

    public function cuenta()
    {
        return $this->hasOne(Cuenta::class);
    }

    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class);
    }
    public function contactos()
    {
        return $this->hasOne(Contacto::class);
    }
}
