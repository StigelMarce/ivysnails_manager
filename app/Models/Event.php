<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Event extends Model
{
    use SoftDeletes;
    
    // definir los atributos id title date description
    protected $fillable = ['title', 'date', 'description'];

    // usuario 1 a muchos eventos
    public function user() {
        return $this->belongsTo(User::class);
    }   
}