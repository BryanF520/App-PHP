<?php

namespace App\Contracts;

use App\Models\Acceso;

interface AccesoServiceInterface
{

    public function listarAccesos();
    public function crearAcceso(array $data);
    public function obtenerAcceso(int $id);
    public function actualizarAcceso(int $id, array $data);
    public function desactivarAcceso(int $id);
}
