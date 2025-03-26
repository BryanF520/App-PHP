<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;
use App\Contracts\PersonaServiceInterface;

class PersonasController extends Controller
{
    protected $personasService;

    public function __construct(PersonaServiceInterface $personasService)
    {
        $this->personasService = $personasService;
    }

    public function index()
    {
        $personas = $this->personasService->listarPersonas();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        return view('personas.create');
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
        return view('personas.edit', compact('persona'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_doc' => 'required',
            'num_doc' => 'required|unique:personas,num_doc,' . $id,
            'nombre_uno' => 'required',
            'nombre_dos' => 'nullable',
            'apellido_uno' => 'required',
            'apellido_dos' => 'nullable',
            'edad' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required|email|unique:personas,email,' . $id,
            'rol_id' => 'required',
        ]);

        $this->personasService->actualizarPersona($id, $request->all());
        return redirect()->route('personas.index')->with('success', 'Persona actualizada correctamente');
    }


    public function destroy($id)
    {
        $this->personasService->desactivarPersona($id);
        return redirect()->route('personas.index')->with('success', 'Persona desactivada correctamente');
    }
}
