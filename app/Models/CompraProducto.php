<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompraProducto extends Pivot
{
    use HasFactory;
    protected $fillable = ['compra_id', 'producto_id', 'cantidad', 'precio'];
}
