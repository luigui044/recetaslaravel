<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    // Define los atributos que se pueden asignar en masa
    protected $fillable = ['medico_id', 'paciente_id', 'fecha'];

    /**
     * Relación de pertenencia con el modelo Medico.
     * 
     * Cada receta está asociada a un único médico.
     */
    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    /**
     * Relación de pertenencia con el modelo Paciente.
     * 
     * Cada receta está asociada a un único paciente.
     */
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    /**
     * Relación muchos a muchos con el modelo Medicamento a través de la tabla pivote detalle_recetas.
     * 
     * Una receta puede incluir varios medicamentos y un medicamento puede estar en varias recetas.
     */
    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class, 'detalle_recetas')
                    ->withPivot('cantidad') // Incluye el campo 'cantidad' de la tabla pivote en el resultado
                    ->withTimestamps(); // Incluye las columnas de timestamps (created_at y updated_at) de la tabla pivote
    }
}
