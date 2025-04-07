@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Lista de Usuarios</h1>
        <a href="{{ route('personas.create') }}" class="btn btn-primary">Nuevo Usuario</a>
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
                    <th>Tipo Doc</th>
                    <th>Número Doc</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                <tr>
                    <td>{{ $persona->id }}</td>
                    <td>{{ $persona->tipoDoc->tipo_doc ?? 'Null' }}</td>
                    <td>{{ $persona->num_doc }}</td>
                    <td>{{ $persona->nombre_uno }}</td>
                    <td>{{ $persona->nombre_dos }}</td>
                    <td>{{ $persona->apellido_uno }}</td>
                    <td>{{ $persona->apellido_dos }}</td>
                    <td>{{ $persona->telefono }}</td>
                    <td>{{ $persona->rol->rol ?? 'Null' }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('personas.show', $persona->id) }}" class="btn btn-info btn-sm">Ver</a>
                            @if (session('rol') == 1)
                            <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de desactivar este usuario?')" style="display:inline;">
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