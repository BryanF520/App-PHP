<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Rol;
use App\Models\Tipo_doc;
use Illuminate\Http\Request;
use App\Contracts\PersonaServiceInterface;
use App\Contracts\RolServiceInterface;
use App\Contracts\TipodocServiceInterface;

class PersonasController extends Controller
{
    protected $personasService;
    protected $rolService;
    protected $tipodocService;

    public function __construct(PersonaServiceInterface $personasService, RolServiceInterface $rolService, TipodocServiceInterface $tipodocService)
    {
        $this->personasService = $personasService;
        $this->rolService = $rolService;
        $this->tipodocService = $tipodocService;
    }

    public function index()
    {
        $personas = $this->personasService->listarPersonas();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        $roles = Rol::all();
        $tipodocs = Tipo_doc::all();
        return view('personas.create', compact('roles', 'tipodocs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tipo_doc' => 'required',
            'num_doc' => 'required|unique:personas',
            'nombre_uno' => 'required',
            'nombre_dos' => 'nullable',
            'apellido_uno' => 'required',
            'apellido_dos' => 'nullable',
            'edad' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required|email|unique:personas',
            'rol_id' => 'required',
        ]);

        $this->personasService->crearPersona($request->all());
        return redirect()->route('personas.index')->with('success', 'Persona creada correctamente');
    }

    public function show($id)
    {
        $persona = $this->personasService->obtenerPersona($id);
        return view('personas.show', compact('persona'));
    }

    public function edit($id)
    {
        $persona = $this->personasService->obtenerPersona($id);
        $roles = Rol::all();
        $tipodocs = Tipo_doc::all();
        return view('personas.edit', compact('persona', 'roles', 'tipodocs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_doc' => 'nullable',
            'num_doc' => 'nullable|unique:personas,num_doc,' . $id . ',id',
            'nombre_uno' => 'nullable',
            'nombre_dos' => 'nullable',
            'apellido_uno' => 'nullable',
            'apellido_dos' => 'nullable',
            'edad' => 'nullable',
            'fecha_nacimiento' => 'nullable',
            'email' => 'nullable|email|unique:personas,email,' . $id . ',id',
            'rol_id' => 'nullable|exists:rols,id',
        ]);

        $persona = $this->personasService->actualizarPersona($id, $request->all());
        if (!$persona) {
            return back()->withErrors('Error al actualizar la persona.');
        }
        return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente');
    }


    public function destroy($id)
    {
        $this->personasService->desactivarPersona($id);
        return redirect()->route('personas.index')->with('success', 'Persona desactivada correctamente');
    }
}
