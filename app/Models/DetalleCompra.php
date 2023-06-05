<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'DetalleCompra';

    protected $fillable = [
        'id',
        'cantidad',
        'precio',
        'id_encabezado',
        'id_producto',
        
    ];
    public $timestamps = false;
     //use HasFactory;
}

