<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    // Asignamos el nombre de la tabla a la clase modelo
    protected $table = 'detalles_ordenes';

    public function orden(){
        return $this->belongsTo(Orden::class, 'orden_id');
    }

    public function platillo(){
        return $this->belongsTo(Platillo::class, 'platillo_id');
    }

    // Solo se permitira agregar el id del platillo y la cantidad, el id de la orden se 
    // asignara automaticamente al momento de crear el detalle de orden
    protected $fillable = [
        'orden_id',
        'platillo_id',
        'cantidad',
        'precio_unitario',
        'subtotal'  
    ];
}
