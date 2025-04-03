<?php

namespace App\Contracts;

use App\Models\Tipodoc;

interface TipodocServiceInterface
{

    public function listarTipodocs();
    public function crearTipodoc(array $data);
    public function obtenerTipodoc(int $id);
    public function actualizarTipodoc(int $id, array $data);
    public function desactivarTipodoc(int $id);
}
