<?php

namespace App\Contracts;

use App\Models\Empresa;

interface EmpresaServiceInterface
{

    public function listarEmpresas();
    public function crearEmpresa(array $data);
    public function obtenerEmpresa(int $id);
    public function actualizarEmpresa(int $id, array $data);
    public function desactivarEmpresa(int $id);
}
