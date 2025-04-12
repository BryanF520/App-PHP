<!DOCTYPE html>
<html>

<head>
    <title>Reportes de ingresos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 5px;
            text-align: left;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Reportes de ingresos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de ingreso</th>
                <th>Empresa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accesos as $acceso)
            <tr>
                <td>{{ $acceso->persona->nombre_uno }} {{ $acceso->persona->nombre_dos }}</td>
                <td>{{ $acceso->persona->apellido_uno }} {{ $acceso->persona->apellido_dos }}</td>
                <td>{{ \Carbon\Carbon::parse($acceso->fecha_ingreso)->format('d/m/Y H:i:s') }}</td>
                <td>{{ $acceso->empresa->nombre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>