<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    // Define los atributos que se pueden asignar en masa
    protected $fillable = ['nombre', 'establecimiento_id'];

    /**
     * Relación de pertenencia con el modelo Establecimiento.
     * 
     * Cada médico pertenece a un único establecimiento.
     */
    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class);
    }

    /**
     * Relación uno a muchos con el modelo Receta.
     * 
     * Un médico puede tener muchas recetas asociadas.
     */
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
}
