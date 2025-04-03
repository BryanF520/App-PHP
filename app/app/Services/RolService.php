<?php

namespace App\Services;

use App\Contracts\RolServiceInterface;
use App\Models\Rol;

class RolService implements RolServiceInterface
{

    public function listarRoles()
    {
        return Rol::all();
    }

    public function crearRol(array $data)
    {
        return Rol::create($data);
    }

    public function obtenerRol(int $id)
    {
        return Rol::find($id);
    }

    public function actualizarRol(int $id, array $data)
    {
        return Rol::find($id)->update($data);
    }

    public function desactivarRol(int $id)
    {
        return Rol::find($id)->delete();
    }
}
