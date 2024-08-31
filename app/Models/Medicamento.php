<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    // Define los atributos que se pueden asignar en masa
    protected $fillable = ['nombre', 'descripcion'];

    /**
     * Relación muchos a muchos con el modelo Receta a través de la tabla pivote detalle_recetas.
     * 
     * Un medicamento puede aparecer en muchas recetas y una receta puede contener muchos medicamentos.
     */
    public function recetas()
    {
        return $this->belongsToMany(Receta::class, 'detalle_recetas')
                    ->withPivot('cantidad') // Incluye el campo 'cantidad' de la tabla pivote en el resultado
                    ->withTimestamps(); // Incluye las columnas de timestamps (created_at y updated_at) de la tabla pivote
    }
}
