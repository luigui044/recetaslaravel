<!-- resources/views/recetas/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Crear Nueva Receta</h2>

        <!-- Muestra errores de validación si existen -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para crear una nueva receta -->
        <form action="{{ route('recetas.store') }}" method="POST">
            @csrf <!-- Token de seguridad para proteger contra ataques CSRF -->

            <!-- Campo para seleccionar el médico -->
            <div class="mb-3">
                <label for="medico_id" class="form-label">Médico</label>
                <select name="medico_id" id="medico_id" class="form-select" required>
                    <option value="">Seleccione un médico</option>
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para seleccionar el paciente -->
            <div class="mb-3">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select name="paciente_id" id="paciente_id" class="form-select" required>
                    <option value="">Seleccione un paciente</option>
                    @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Campo para seleccionar la fecha -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            <!-- Campo para seleccionar medicamentos y especificar cantidades -->
            <div class="mb-3">
                <label for="medicamentos" class="form-label">Medicamentos</label>
                <div id="medicamentos">
                    @foreach ($medicamentos as $index => $medicamento)
                        <div class="form-check">
                            <!-- Checkbox para seleccionar el medicamento -->
                            <input type="checkbox" name="medicamentos[]" value="{{ $medicamento->id }}"
                                id="medicamento_{{ $index }}" class="form-check-input">
                            <label for="medicamento_{{ $index }}"
                                class="form-check-label">{{ $medicamento->nombre }}</label>

                            <!-- Campo para ingresar la cantidad del medicamento -->
                            <input type="number" name="cantidad[]" class="form-control mt-2" placeholder="Cantidad"
                                min="1" step="1">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-primary">Crear Receta</button>
        </form>
    </div>
@endsection
