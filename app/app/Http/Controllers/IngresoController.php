<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AccesoServiceInterface;
use App\Contracts\PersonaServiceInterface;
use App\Contracts\TipodocServiceInterface;
use App\Models\Personas;
use App\Models\Acceso;
use App\Models\Empresa;
use Illuminate\Database\QueryException;
use App\Contracts\RolServiceInterface;
use App\Models\Rol;

class IngresoController extends Controller
{
    protected $accesoService;
    protected $personaService;
    protected $tipodocService;
    protected $rolService;

    public function __construct(AccesoServiceInterface $accesoService, PersonaServiceInterface $personaService, TipodocServiceInterface $tipodocService, RolServiceInterface $rolService)
    {
        $this->accesoService = $accesoService;
        $this->personaService = $personaService;
        $this->tipodocService = $tipodocService;
        $this->rolService = $rolService;
    }

    public function index()
    {
        $ingresos = $this->accesoService->listarAccesos();
        return view('ingresos.index', compact('ingresos'));
    }

    public function create()
    {
        $roles = Rol::whereIn('id', [3, 4])->get();
        $personas = $this->personaService->listarPersonas();
        $tipodocs = $this->tipodocService->listarTipodocs();
        $empresas = \App\Models\Empresa::all();

        return view('ingresos.create', compact('personas', 'tipodocs', 'empresas', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_uno' => 'required|string|max:255',
            'apellido_uno' => 'required|string|max:255',
            'tipo_doc' => 'required|exists:tipo_docs,id',
            'num_doc' => 'required|string|max:30',
            'telefono' => 'required|string|max:20',
            'motivo' => 'required|string',
            'fecha_ingreso' => 'required|date',
            'empresa_id' => 'required|exists:empresas,id',
        ]);

        try {
            $existingPerson = Personas::where('num_doc', $request->num_doc)
                ->orWhere('telefono', $request->telefono)
                ->first();

            if ($existingPerson) {
                $persona = $existingPerson;
            } else {
                $persona = Personas::create([
                    'nombre_uno' => $request->nombre_uno,
                    'nombre_dos' => $request->nombre_dos ?? null,
                    'apellido_uno' => $request->apellido_uno,
                    'apellido_dos' => $request->apellido_dos ?? null,
                    'tipo_doc' => $request->tipo_doc,
                    'num_doc' => $request->num_doc,
                    'telefono' => $request->telefono,
                    'rol_id' => $request->rol_id ?? 4,
                ]);
            }

            Acceso::create([
                'persona_id' => $persona->id,
                'motivo' => $request->motivo,
                'fecha_ingreso' => $request->fecha_ingreso,
                'empresa_id' => $request->empresa_id,
            ]);

            return redirect()->route('ingresos.index')->with('success', 'Acceso creado correctamente');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return back()->with('error', 'Error: El número de teléfono o documento ya existe en la base de datos.')
                    ->withInput();
            }
            return back()->with('error', 'Error en la base de datos: ' . $e->getMessage())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $ingreso = Acceso::with(['persona', 'empresa'])->findOrFail($id);
        return view('ingresos.show', compact('ingreso'));
    }

    public function edit($id)
    {
        $roles = Rol::whereIn('id', [3, 4])->get();
        $ingreso = Acceso::findOrFail($id);
        $personas = $this->personaService->listarPersonas();
        $tipodocs = $this->tipodocService->listarTipodocs();
        $empresas = Empresa::all();

        return view('ingresos.edit', compact('ingreso', 'personas', 'tipodocs', 'empresas', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_doc' => 'required|exists:tipo_docs,id',
            'num_doc' => 'required|string|max:30',
            'nombre_uno' => 'required|string|max:255',
            'nombre_dos' => 'nullable|string|max:255',
            'apellido_uno' => 'required|string|max:255',
            'apellido_dos' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:20',
            'motivo' => 'required|string',
            'fecha_ingreso' => 'required|date',
        ]);

        try {
            $ingreso = Acceso::findOrFail($id);
            $persona = $ingreso->persona;

            $persona->update([
                'tipo_doc' => $request->tipo_doc,
                'num_doc' => $request->num_doc,
                'nombre_uno' => $request->nombre_uno,
                'nombre_dos' => $request->nombre_dos,
                'apellido_uno' => $request->apellido_uno,
                'apellido_dos' => $request->apellido_dos,
                'telefono' => $request->telefono,
            ]);

            $ingreso->update([
                'motivo' => $request->motivo,
                'fecha_ingreso' => $request->fecha_ingreso,
            ]);

            return redirect()->route('ingresos.index')->with('success', 'Ingreso actualizado correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        $persona = Personas::findOrFail($id);

        $persona->accesos()->delete();

        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada correctamente');
    }
}
