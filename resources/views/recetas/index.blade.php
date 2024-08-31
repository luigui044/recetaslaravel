<!-- resources/views/recetas/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Listado de Recetas</h2>

        <!-- Muestra un mensaje de éxito si existe una sesión 'success' -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla para listar las recetas -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <!-- Encabezados de la tabla -->
                    <th>No. de Receta</th>
                    <th>Médico</th>
                    <th>Paciente</th>
                    <th>Fecha</th>
                    <th>Medicamentos</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre cada receta y genera una fila en la tabla -->
                @foreach ($recetas as $receta)
                    <tr>
                        <td>{{ $receta->id }}</td> <!-- Muestra el ID de la receta -->
                        <td>{{ $receta->medico->nombre }}</td> <!-- Muestra el nombre del médico asociado -->
                        <td>{{ $receta->paciente->nombre }}</td> <!-- Muestra el nombre del paciente asociado -->
                        <td>{{ $receta->fecha }}</td> <!-- Muestra la fecha de la receta -->
                        <td>
                            <!-- Itera sobre los medicamentos asociados a la receta -->
                            @foreach ($receta->medicamentos as $medicamento)
                                <!-- Muestra el nombre del medicamento y la cantidad recetada -->
                                {{ $medicamento->nombre }} ({{ $medicamento->pivot->cantidad }}),
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
