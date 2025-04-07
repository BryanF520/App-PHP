@extends('layouts.app')

@section('title', 'Resultados de la Búsqueda')

@section('content')
<div class="container mt-4">
    <h1>Resultados de la Búsqueda</h1>
    <p>Mostrando accesos para la fecha: <strong>{{ $fechaIngreso }}</strong></p>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Persona</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Empresa</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($accesos as $acceso)
                <tr>
                    <td>{{ $acceso->id }}</td>
                    <td>{{ $acceso->persona_id }}</td>
                    <td>{{ $acceso->motivo }}</td>
                    <td>{{ $acceso->fecha_ingreso }}</td>
                    <td>{{ $acceso->empresa_id }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No se encontraron accesos para la fecha seleccionada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <a href="{{ route('accesos.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection