<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'costo',
        'stock'
    ];

    /**
     * Relación muchos a muchos con Venta a través de la tabla pivote ProductoVenta.
     */
    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'producto_venta')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }

    /**
     * Relación muchos a muchos con Compra a través de la tabla pivote CompraProducto.
     */
    public function compras()
    {
        return $this->belongsToMany(Compra::class, 'compra_producto')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}