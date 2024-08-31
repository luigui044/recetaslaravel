<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleReceta extends Model
{
    // Define la tabla asociada con este modelo
    protected $table = 'detalle_recetas';

    // Especifica los atributos que se pueden asignar en masa
    protected $fillable = ['receta_id', 'medicamento_id', 'cantidad'];

    /**
     * Relación de pertenencia con el modelo Receta.
     * 
     * Cada detalle de receta pertenece a una receta específica.
     */
    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }

    /**
     * Relación de pertenencia con el modelo Medicamento.
     * 
     * Cada detalle de receta está asociado a un medicamento específico.
     */
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class);
    }
}
