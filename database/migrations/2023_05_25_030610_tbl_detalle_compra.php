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
        Schema::create('DetalleCompra', function (Blueprint $table){
            $table->id();
            $table->integer('cantidad');
            $table->decimal('precio',8,2);

            $table->unsignedBigInteger('id_encabezado');
            $table->foreign('id_encabezado')->references('id')->on('EncabezadoCompra');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto')->references('id')->on('Producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
