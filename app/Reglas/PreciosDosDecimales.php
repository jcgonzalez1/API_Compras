<?php

namespace App\Reglas;

class PreciosDosDecimales extends DetalleCompraReglas
{
    public function passes($attribute, $value)
    {
        return preg_match('/^\d+(\.\d{2})?$/', $value);
    }


    public function message()
    {
        return 'El campo :attribute solo debe contener dos decimales';
    }
}