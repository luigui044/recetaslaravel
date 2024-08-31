<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receta;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Medicamento;

class RecetaController extends Controller
{
    // Método para mostrar el formulario de creación de recetas
    public function create()
    {
        // Recupera todos los registros de médicos, pacientes y medicamentos de la base de datos
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $medicamentos = Medicamento::all();

        // Retorna la vista de creación de recetas, pasando los datos recuperados
        return view('recetas.create', compact('medicos', 'pacientes', 'medicamentos'));
    }

    // Método para almacenar una nueva receta en la base de datos
    public function store(Request $request)
    {
        // Valida los datos recibidos del formulario
        $request->validate([
            'medico_id' => 'required|exists:medicos,id', // Asegura que el ID del médico exista
            'paciente_id' => 'required|exists:pacientes,id', // Asegura que el ID del paciente exista
            'fecha' => 'required|date', // Verifica que la fecha sea válida
            'medicamentos' => 'required|array', // Asegura que se haya seleccionado al menos un medicamento
            'medicamentos.*' => 'exists:medicamentos,id', // Verifica que cada medicamento seleccionado exista
        ]);

        // Crea una nueva receta en la base de datos con los datos validados
        $receta = Receta::create($request->only('medico_id', 'paciente_id', 'fecha'));

        // Inicializa un array vacío para asociar medicamentos con cantidades
        $medicamentos = [];
        foreach ($request->medicamentos as $index => $medicamentoId) {
            // Combina cada medicamento con su respectiva cantidad
            $medicamentos[$medicamentoId] = ['cantidad' => $request->cantidad[$index]];
        }

        // Asocia los medicamentos a la receta en la tabla pivote, incluyendo las cantidades
        $receta->medicamentos()->attach($medicamentos);

        // Redirige al listado de recetas con un mensaje de éxito
        return redirect()->route('recetas.index')->with('success', 'Receta creada con éxito');
    }

    // Método para mostrar una lista de todas las recetas
    public function index()
    {
        // Recupera todas las recetas, incluyendo la relación con médicos y pacientes para evitar múltiples consultas
        $recetas = Receta::with('medico', 'paciente')->get();

        // Retorna la vista que lista las recetas, pasando los datos recuperados
        return view('recetas.index', compact('recetas'));
    }
}
