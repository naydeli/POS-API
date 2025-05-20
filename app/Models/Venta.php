<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'total',
        'fecha_venta',
        'metodo_pago',
        'estado',
        'observaciones'
    ];

      /**
     * Relación muchos a muchos con Producto a través de la tabla pivote ProductoVenta.
     */
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_venta')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}
