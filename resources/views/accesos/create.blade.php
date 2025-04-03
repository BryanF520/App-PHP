@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Crear Acceso</h1>
        <form method="POST" action="{{ route('accesos.store') }}">
            @csrf
            <div class="mb-3">
                <label for="persona_id" class="form-label">Persona</label>
                <input type="text" id="persona_id" name="persona_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="motivo" class="form-label">Motivo:</label>
                <input type="text" id="motivo" name="motivo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha_ingreso" class="form-label">Ingreso</label>
                <input type="datetime-local" id="fecha_ingreso" name="fecha_ingreso" class="form-control"required>
            </div>
            <div class="mb-3">
                <label for="empresa_id" class="form label">Empresa</label>
                <input type="text" id="empresa_id" name="empresa_id" class="form-control"required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Acceso</button>
        </form>
    </div>
</div>
@endsection

                    