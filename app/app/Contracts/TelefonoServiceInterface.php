<?php

namespace App\Contracts;

use App\Models\Telefono;

interface TelefonoServiceInterface
{

    public function listarTelefonos();
    public function crearTelefono(array $data);
    public function obtenerTelefono(int $id);
    public function actualizarTelefono(int $id, array $data);
    public function desactivarTelefono(int $id);
}
