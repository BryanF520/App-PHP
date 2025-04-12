@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Reportes de Accesos</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('reportes.index') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ request('nombre') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="{{ request('apellido') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="fecha" class="form-control" value="{{ request('fecha') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="empresa" class="form-control" placeholder="Empresa" value="{{ request('empresa') }}">
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">Buscar</button>
                    <a href="{{ route('reportes.pdf', request()->all()) }}" class="btn btn-danger px-4 ms-2">Descargar PDF</a>
                </div>
            </form>
        </div>
    </div>

    @if($accesos->isEmpty())
    <div class="alert alert-info text-center">
        No se encontraron accesos con los criterios especificados.
    </div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>Nombre completo</th>
                    <th>Apellidos</th>
                    <th>Fecha de ingreso</th>
                    <th>Empresa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($accesos as $acceso)
                <tr>
                    <td>{{ $acceso->persona->nombre_uno }} {{ $acceso->persona->nombre_dos }}</td>
                    <td>{{ $acceso->persona->apellido_uno }} {{ $acceso->persona->apellido_dos }}</td>
                    <td>{{ \Carbon\Carbon::parse($acceso->fecha_ingreso)->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $acceso->empresa->nombre }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection