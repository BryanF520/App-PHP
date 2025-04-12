<?php

namespace App\Http\Controllers;

use App\Models\Acceso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        $filters = array_filter($request->only(['nombre', 'apellido', 'fecha', 'empresa']));

        if (!empty($filters)) {
            $query = Acceso::with('persona', 'empresa');

            if ($request->filled('nombre')) {
                $query->whereHas('persona', function ($q) use ($request) {
                    $q->where('nombre_uno', 'like', '%' . $request->nombre . '%')
                        ->orWhere('nombre_dos', 'like', '%' . $request->nombre . '%');
                });
            }

            if ($request->filled('apellido')) {
                $query->whereHas('persona', function ($q) use ($request) {
                    $q->where('apellido_uno', 'like', '%' . $request->apellido . '%')
                        ->orWhere('apellido_dos', 'like', '%' . $request->apellido . '%');
                });
            }

            if ($request->filled('fecha')) {
                $query->whereDate('fecha_ingreso', $request->fecha);
            }

            if ($request->filled('empresa')) {
                $query->whereHas('empresa', function ($q) use ($request) {
                    $q->where('nombre', 'like', '%' . $request->empresa . '%');
                });
            }

            $accesos = $query->get();
        } else {
            $accesos = collect();
        }

        return view('reportes.index', compact('accesos'));
    }


    public function descargarPDF(Request $request)
    {
        $query = Acceso::with('persona', 'empresa');

        if ($request->filled('nombre')) {
            $query->whereHas('persona', function ($q) use ($request) {
                $q->where('nombre_uno', 'like', '%' . $request->nombre . '%')
                    ->orWhere('nombre_dos', 'like', '%' . $request->nombre . '%');
            });
        }

        if ($request->filled('apellido')) {
            $query->whereHas('persona', function ($q) use ($request) {
                $q->where('apellido_uno', 'like', '%' . $request->apellido . '%')
                    ->orWhere('apellido_dos', 'like', '%' . $request->apellido . '%');
            });
        }

        if ($request->filled('fecha')) {
            $query->whereDate('fecha_ingreso', $request->fecha);
        }

        if ($request->filled('empresa')) {
            $query->whereHas('empresa', function ($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->empresa . '%');
            });
        }

        $accesos = $query->get();

        $pdf = Pdf::loadView('reportes.pdf', compact('accesos'));

        return $pdf->download('reporte_ingresos.pdf');
    }
}
