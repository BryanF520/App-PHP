@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Lista de Empresas</h1>
        @if (session()->has('rol') && session('rol') === 'admin')
        <a href="{{ route('empresas.create') }}" class="btn btn-primary">Nueva Empresa</a>
        @endif
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
                    <th>NIT</th>
                    <th>Área</th>
                    <th>Contacto</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->id }}</td>
                    <td>{{ $empresa->nit }}</td>
                    <td>{{ $empresa->area }}</td>
                    <td>{{ $empresa->contacto }}</td>
                    <td>{{ $empresa->ubicacion }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('empresas.show', $empresa->id) }}" class="btn btn-info btn-sm">Ver</a>
                            @if (session()->has('rol') && session('rol') === 'admin')
                            <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta empresa?')" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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