<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    // Define los atributos que se pueden asignar en masa
    protected $fillable = ['nombre', 'direccion'];

    /**
     * Relación uno a muchos con el modelo Receta.
     * 
     * Un paciente puede tener muchas recetas asociadas.
     */
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
}
