<?php
 
 namespace App\Reglas;

 class SoloLetras extends DetalleCompraReglas
 {
    public function passes($attribute, $value)
    {
        return preg_match('/^[a-zA-z\s]+$/', $value);
    }

    public function message()
    {
        return 'El campo :attribute debe contener solo letras';
    }

 }