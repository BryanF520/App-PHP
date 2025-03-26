@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Persona</h1>
    <form method="POST" action="{{ route('personas.update') }}">
        @csrf
        <div>
            <label for="tipo_doc_id">Tipo de Documento:</label>
            <input type="text" id="tipo_doc_id" name="tipo_doc_id" required>
        </div>
        <div>
            <label for="num_doc">Número de Documento:</label>
            <input type="text" id="num_doc" name="num_doc" required>
        </div>
        <div>
            <label for="nombre_uno">Primer Nombre:</label>
            <input type="text" id="nombre_uno" name="nombre_uno" required>
        </div>
        <div>
            <label for="nombre_dos">Segundo Nombre:</label>
            <input type="text" id="nombre_dos" name="nombre_dos">
        </div>
        <div>
            <label for="apellido_uno">Primer Apellido:</label>
            <input type="text" id="apellido_uno" name="apellido_uno" required>
        </div>
        <div>
            <label for="apellido_dos">Segundo Apellido:</label>
            <input type="text" id="apellido_dos" name="apellido_dos">
        </div>
        <div>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>
        </div>
        <div>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="rol_id">Rol:</label>
            <input type="text" id="rol_id" name="rol_id" required>
        </div>
        <button type="submit">Crear Persona</button>
    </form>
</div>
@endsection