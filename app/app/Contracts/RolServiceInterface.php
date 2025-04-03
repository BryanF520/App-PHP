<?php

namespace App\Contracts;

use App\Models\Rol;

interface RolServiceInterface
{

    public function listarRoles();
    public function crearRol(array $data);
    public function obtenerRol(int $id);
    public function actualizarRol(int $id, array $data);
    public function desactivarRol(int $id);
}
