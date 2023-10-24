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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('Nombre');
            $table->string('Descripcion_del_Producto',50);
            $table->string('Categoria');
            $table->string('Precio');
            $table->integer('Stock');
            $table->string('Fotografia');
            $table->float('Peso_Dimension');
            $table->date('Fecha_Ingreso');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
