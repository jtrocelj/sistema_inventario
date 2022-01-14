<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['total','items','efectivo','cambio','status','usuario_id'];

    public function detalle_ventas()
{
    return $this->hasMany("App\Models\DetalleVenta", "id_venta");
}

public function cliente()
{
    return $this->belongsTo("App\Models\Cliente", "id_cliente");
}
}

