@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Lista de accesos</h1>
        <a href="{{ route('accesos.create') }}" class="btn btn-primary">Nuevo Acceso</a>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Persona id</th>
                    <th>motivo</th>
                    <th>fecha ingreso</th>
                    <th>empresa_id </th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accesos as $acceso)
                <tr>
                    <td>{{ $acceso->id }}</td>
                    <td>{{ $acceso->persona_id }}</td>
                    <td>{{ $acceso->motivo }}</td>
                    <td>{{ $acceso->fecha_ingreso }}</td>
                    <td>{{ $acceso->empresa_id }}</td>
                <td>
                <div class="d-flex gap-2">
                            <a href="{{ route('accesos.show', $acceso->id) }}" class="btn btn-info btn-sm">Ver</a>
                            @if (session()->has('rol') && session('rol') === 'admin')
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
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection