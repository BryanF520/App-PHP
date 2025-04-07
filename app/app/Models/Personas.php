<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Personas extends Authenticatable
{
    protected $fillable = ['tipo_doc', 'num_doc', 'nombre_uno', 'nombre_dos', 'apellido_uno', 'apellido_dos', 'telefono', 'rol_id', 'password'];
    protected $hidden = ['password'];

    public function tipoDoc()
    {
        return $this->belongsTo(Tipo_doc::class, 'tipo_doc', 'id');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'id');
    }

    public function acceso()
    {
        return $this->hasMany(Acceso::class);
    }

    public function tarjeta()
    {
        return $this->hasMany(Tarjeta::class);
    }
}
