<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'proveedor_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'total',
        'fecha_compra',
        'metodo_pago',
        'estado',
        'observaciones',
        'tipo_documento',
        'numero_documento',
        'moneda',
        'tipo_cambio',
        'forma_pago',

    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function productos()
    {
        return $this->hasMany(CompraProducto::class);
    }
}
