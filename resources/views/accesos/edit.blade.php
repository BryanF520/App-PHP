@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Crear Acceso</h1>
        <form method="POST" action="{{ route('accesos.update', $acceso->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                <label for="persona_id" class="form-label">Persona</label>
                <input type="text" id="persona_id" name="persona_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo:</label>
                    <input type="text" id="motivo" name="motivo" class="form-control" value="{{ $acceso->motivo }}" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_ingreso" class="form-label">Ingreso</label>
                    <input type="datetime-local" id="fecha_ingreso" name="fecha_ingreso" class="form-control" value="{{ $acceso->fecha_ingreso }}" required>
                </div>
                <div class="mb-3">
                    <label for="empresa_id" class="form-label">Empresa</label>
                    <input type="text" id="empresa_id" name="empresa_id" class="form-control" value="{{ $acceso->empresa_id }}" required>
                </div>
                    <button type="submit" class="btn btn-primary">Actualizar Acceso</button>
                </div>
            </form>
        </div>
</div>
@endsection
