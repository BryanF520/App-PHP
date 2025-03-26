@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('personas.create') }}" class="btn btn-primary">Nuevo Usuario</a>
    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>CC</th>
                <th>Nro doc</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Edad</th>
                <th>Fecha</th>
                <th>Email</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
            <tr>
                <td>{{ $persona->id }}</td>
                <td>{{ $persona->tipo_doc }}</td>
                <td>{{ $persona->num_doc }}</td>
                <td>{{ $persona->nombre_uno }}</td>
                <td>{{ $persona->nombre_dos }}</td>
                <td>{{ $persona->apellido_uno }}</td>
                <td>{{ $persona->apellidos_dos }}</td>
                <td>{{ $persona->edad }}</td>
                <td>{{ $persona->fecha_nacimiento }}</td>
                <td>{{ $persona->email }}</td>
                <td>{{ $persona->rol_id }}</td>
                <td>
                    <a href="{{ route('personas.show', $persona->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Desactivar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection