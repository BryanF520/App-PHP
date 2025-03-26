@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Persona</h1>
    <div>
        <label>Tipo de Documento:</label>
        <span>{{ $persona->tipo_doc_id }}</span>
    </div>
    <div>
        <label>Número de Documento:</label>
        <span>{{ $persona->num_doc }}</span>
    </div>
    <div>
        <label>Primer Nombre:</label>
        <span>{{ $persona->nombre_uno }}</span>
    </div>
    <div>
        <label>Segundo Nombre:</label>
        <span>{{ $persona->nombre_dos }}</span>
    </div>
    <div>
        <label>Primer Apellido:</label>
        <span>{{ $persona->apellido_uno }}</span>
    </div>
    <div>
        <label>Segundo Apellido:</label>
        <span>{{ $persona->apellido_dos }}</span>
    </div>
    <div>
        <label>Edad:</label>
        <span>{{ $persona->edad }}</span>
    </div>
    <div>
        <label>Fecha de Nacimiento:</label>
        <span>{{ $persona->fecha_nacimiento }}</span>
    </div>
    <div>
        <label>Email:</label>
        <span>{{ $persona->email }}</span>
    </div>
    <div>
        <label>Rol:</label>
        <span>{{ $persona->rol_id }}</span>
    </div>
    <a href="{{ route('personas.index') }}">Volver a la lista</a>
</div>
@endsection