<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    protected $fillable = ['id_vistante', 'motivo', 'estad', 'fecha', 'empresa_id'];

    public function persona()
    {
        return $this->belongsTo(Personas::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
