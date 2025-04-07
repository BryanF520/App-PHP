<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\Rol;
use App\Models\Tipo_doc;
use Illuminate\Http\Request;
use App\Contracts\PersonaServiceInterface;
use App\Contracts\RolServiceInterface;
use App\Contracts\TipodocServiceInterface;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $personas = Personas::with('rol', 'tipoDoc')->get();
        $personas = $this->personasService->listarPersonas();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {

        $userRole = Auth::check() ? Auth::user()->rol_id : null;

        if ($userRole == 1) { //admin
            // Obtener todos los roles
            $roles = Rol::all();
        } elseif ($userRole == 2) { //recepcionista
            // Obtener solo los roles de empleado y visitante
            $roles = Rol::whereIn('id', [3, 4])->get();
        } else {
            abort(403, 'no puedes hacer esto');
        }
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
            'telefono' => 'required|unique:personas',
            'rol_id' => 'required',
            'password' => 'nullable|min:4',

        ]);

        $userRole = session('rol'); // O auth()->user()->rol_id
        if ($userRole == 2 && !in_array($request->rol_id, [3, 4])) {
            return back()->withErrors(['rol_id' => 'No tienes permiso para asignar este rol.']);
        }

        //encriptar la contraseña
        $data = $request->all();
        $data['password'] = bcrypt($request->input('password'));

        $this->personasService->crearPersona($data);
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
            'telefono' => 'nullable|unique:personas,telefono,' . $id . ',id',
            'rol_id' => 'nullable|exists:rols,id',
            'password' => 'nullable|min:4', // La contraseña es opcional
        ]);

        // Obtener los datos enviados
        $data = $request->all();

        // Encriptar la contraseña solo si se envió
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        } else {
            // Si no se envió una nueva contraseña, eliminamos el campo para no sobrescribirlo
            unset($data['password']);
        }

        // Actualizar la persona
        $persona = $this->personasService->actualizarPersona($id, $data);

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
