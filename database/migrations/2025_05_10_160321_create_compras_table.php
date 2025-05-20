<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade'); // Relación con proveedores
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // Relación con productos
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('total', 10, 2);
            $table->date('fecha_compra');
            $table->string('metodo_pago')->default('efectivo');
            $table->string('estado')->default('pendiente');
            $table->string('observaciones')->nullable();
            $table->string('tipo_documento')->default('factura');
            $table->string('numero_documento')->nullable();
            $table->string('moneda')->default('cordobas');
            $table->decimal('tipo_cambio', 10, 2)->nullable();
            $table->string('forma_pago')->default('contado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
