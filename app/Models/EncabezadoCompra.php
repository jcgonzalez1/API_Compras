<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncabezadoCompra extends Model
{
    protected $table = 'EncabezadoCompra';

    protected $fillable = [
        'id',
        'codigoFactura',
        'fechaCompra',
        
    ];
    public $timestamps = false;
     //use HasFactory;
}
