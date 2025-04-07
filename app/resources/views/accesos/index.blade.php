@extends('layouts.app')

@section('title', 'Gestión de Accesos')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Gestión de Accesos</h3>
            <a href="{{ route('accesos.create') }}" class="btn btn-primary">Agregar Acceso</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Persona</th>
                        <th>Motivo</th>
                        <th>Fecha</th>
                        <th>Empresa</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($accesos as $acceso)
                    <tr>
                        <td>{{ $acceso->id }}</td>
                        <td>{{ $acceso->persona->nombre_uno ?? 'Null' }}</td>
                        <td>{{ $acceso->motivo }}</td>
                        <td>{{ $acceso->fecha_ingreso }}</td>
                        <td>{{ $acceso->empresa->nombre ?? 'Null' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('accesos.show', $acceso->id) }}" class="btn btn-info btn-sm">Ver</a>
                                @if (session('rol') == 1)
                                <a href="{{ route('accesos.edit', $acceso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('accesos.destroy', $acceso->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de desactivar este usuario?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Desactivar</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay accesos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection