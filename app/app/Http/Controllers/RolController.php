<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Contracts\RolServiceInterface;

class RolController extends Controller
{
    protected $rolService;

    public function __construct(RolServiceInterface $rolService)
    {
        $this->rolService = $rolService;
    }

    public function index()
    {
        $roles = $this->rolService->listarRoles();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rol' => 'required'
        ]);

        $this->rolService->crearRol($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente');
    }

    public function show($id)
    {
        $rol = $this->rolService->obtenerRol($id);
        return view('roles.show', compact('rol'));
    }

    public function edit($id)
    {
        $rol = $this->rolService->obtenerRol($id);
        return view('roles.edit', compact('rol'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rol' => 'required'
        ]);

        $this->rolService->actualizarRol($id, $request->all());
        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente');
    }

    public function destroy($id)
    {
        $rol = $this->rolService->obtenerRol($id);
        $this->rolService->desactivarRol($rol);
        return redirect()->route('roles.index')->with('success', 'Rol desactivado correctamente');
    }
}
