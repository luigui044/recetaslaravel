<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    // Define los atributos que se pueden asignar en masa
    protected $fillable = ['nombre', 'direccion'];

    /**
     * Relación uno a muchos con el modelo Medico.
     * 
     * Un establecimiento puede tener varios médicos asociados.
     */
    public function medicos()
    {
        return $this->hasMany(Medico::class);
    }
}
