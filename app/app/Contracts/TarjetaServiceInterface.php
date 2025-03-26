<?php

namespace App\Contracts;

use App\Models\Tarjeta;

interface TarjetaServiceInterface
{

    public function listarTarjetas();
    public function crearTarjeta(array $data);
    public function obtenerTarjeta(int $id);
    public function actualizarTarjeta(int $id, array $data);
    public function desactivarTarjeta(int $id);
}
