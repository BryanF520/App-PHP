@extends('layouts.app')

@section('title', 'Editar Ingreso')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Editar Ingreso #{{ $ingreso->id }}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('ingresos.update', $ingreso->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="tipo_doc" class="form-label">Tipo de Documento:</label>
                    <select name="tipo_doc" id="tipo_doc" class="form-control" required>
                        @foreach ($tipodocs as $doc)
                        <option value="{{ $doc->id }}" {{ $ingreso->persona->tipo_doc == $doc->id ? 'selected' : '' }}>
                            {{ $doc->tipo_doc }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="num_doc" class="form-label">Número de Documento:</label>
                    <input type="text" id="num_doc" name="num_doc" class="form-control" value="{{ $ingreso->persona->num_doc }}" required>
                </div>

                <div class="mb-3">
                    <label for="nombre_uno" class="form-label">Primer Nombre:</label>
                    <input type="text" id="nombre_uno" name="nombre_uno" class="form-control" value="{{ $ingreso->persona->nombre_uno }}" required>
                </div>

                <div class="mb-3">
                    <label for="nombre_dos" class="form-label">Segundo Nombre:</label>
                    <input type="text" id="nombre_dos" name="nombre_dos" class="form-control" value="{{ $ingreso->persona->nombre_dos }}">
                </div>

                <div class="mb-3">
                    <label for="apellido_uno" class="form-label">Primer Apellido:</label>
                    <input type="text" id="apellido_uno" name="apellido_uno" class="form-control" value="{{ $ingreso->persona->apellido_uno }}" required>
                </div>

                <div class="mb-3">
                    <label for="apellido_dos" class="form-label">Segundo Apellido:</label>
                    <input type="text" id="apellido_dos" name="apellido_dos" class="form-control" value="{{ $ingreso->persona->apellido_dos }}">
                </div>
                <div class="mb-3">
                    <label for="rol_id" class="form-label">Rol:</label>
                    <select name="rol_id" id="rol_id" class="form-control">
                        <option value="" disabled selected>Seleccione un Rol</option>
                        @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}" {{$ingreso->rol_id == $rol->id ? 'selected' : ''}}>{{ $rol->rol }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" value="{{ $ingreso->persona->telefono }}" required>
                </div>

                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo:</label>
                    <textarea id="motivo" name="motivo" class="form-control" rows="3" required>{{ $ingreso->motivo }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="fecha_ingreso" class="form-label">Fecha de Ingreso:</label>
                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control" value="{{ $ingreso->fecha_ingreso }}" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('ingresos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection