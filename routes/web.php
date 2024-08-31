<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecetaController;

/**
 * Ruta para mostrar la lista de recetas.
 * 
 * - URL: /
 * - Método HTTP: GET
 * - Controlador: RecetaController
 * - Método: index
 * - Nombre de la ruta: recetas.index
 */
Route::get('/', [RecetaController::class, 'index'])->name('recetas.index');

/**
 * Ruta para mostrar el formulario de creación de una nueva receta.
 * 
 * - URL: /recetas/create
 * - Método HTTP: GET
 * - Controlador: RecetaController
 * - Método: create
 * - Nombre de la ruta: recetas.create
 */
Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');

/**
 * Ruta para almacenar una nueva receta en la base de datos.
 * 
 * - URL: /recetas
 * - Método HTTP: POST
 * - Controlador: RecetaController
 * - Método: store
 * - Nombre de la ruta: recetas.store
 */
Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
