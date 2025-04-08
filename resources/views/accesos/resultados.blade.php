@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Resultados de Accesos del {{ $fecha }}</h4>
            </div>
            <div class="card-body">
                @if ($accesos->isEmpty())
                    <div class="alert alert-warning text-center">
                        No hay registros de accesos para esta fecha.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nombre Visitante</th>
                                    <th>Tipo Documento</th>
                                    <th>Número Documento</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Motivo</th>
                                    <th>Empresa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accesos as $acceso)
                                    <tr>
                                        <td>
                                            {{ $acceso->persona->nombre_uno ?? '' }}
                                            {{ $acceso->persona->nombre_dos ?? '' }}
                                            {{ $acceso->persona->apellido_uno ?? '' }}
                                            {{ $acceso->persona->apellido_dos ?? '' }}
                                        </td>
                                        <td>{{ $acceso->persona->tipoDoc->tipo_doc ?? 'N/A' }}</td>
                                        <td>{{ $acceso->persona->num_doc ?? 'Sin número' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($acceso->fecha_ingreso)->format('Y-m-d H:i') }}</td>
                                        <td>{{ $acceso->motivo }}</td>
                                        <td>{{ $acceso->empresa->nombre ?? 'N/A' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-3">
                    ← Volver
                </a>
            </div>
        </div>
    </div>
@endsection
