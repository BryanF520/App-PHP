<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    protected $fillable = ['tipo_doc', 'num_doc', 'nombre_uno', 'nombre_dos', 'apellido_uno', 'apellido_dos', 'edad', 'fecha_nacimiento', 'email', 'rol_id'];

    public function tipo_doc()
    {
        return $this->belongsTo(Tipo_doc::class);
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function telefono()
    {
        return $this->hasMany(Telefono::class);
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
