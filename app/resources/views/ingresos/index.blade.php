@extends('layouts.app')

@section('title', 'Lista de Ingresos')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Lista de Ingresos</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a href="{{ route('ingresos.create') }}" class="btn btn-primary">Crear Nuevo Ingreso</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Persona</th>
                        <th>Motivo</th>
                        <th>Fecha de Ingreso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingresos as $ingreso)
                    <tr>
                        <td>{{ $ingreso->id }}</td>
                        <td>{{ $ingreso->persona->nombre_uno }} {{ $ingreso->persona->nombre_dos }} {{ $ingreso->persona->apellido_uno }} {{ $ingreso->persona->apellido_dos }}</td>
                        <td>{{ $ingreso->motivo }}</td>
                        <td>{{ $ingreso->fecha_ingreso }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('ingresos.show', $ingreso->id) }}" class="btn btn-info btn-sm">Ver</a>

                                @if (session('rol') == 1)
                                <a href="{{ route('ingresos.edit', $ingreso->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                <form action="{{ route('ingresos.destroy', $ingreso->id) }}" method="POST"
                                    onsubmit="return confirm('¿Está seguro de desactivar este usuario?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection