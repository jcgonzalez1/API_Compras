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
        Schema::create('Producto', function (Blueprint $table){
            $table->id();
            $table->string('nombreProducto');
            $table->unsignedBigInteger('id_proveedores');
            $table->foreign('id_proveedores')->references('id')->on('Proveedores');
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
