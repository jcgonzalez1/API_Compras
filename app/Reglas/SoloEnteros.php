<?php
 
 namespace App\Reglas;

 class SoloEnteros extends DetalleCompraReglas
 {
    public function passes($attribute, $value)
    {
        return preg_match('/^[0-9]+$/', $value);
    }

    public function message()
    {
        return 'El campo :attribute debe contener solo numeros enteros';
    }

 }