<?php

namespace App\Reglas;

use Illuminate\Contracts\Validation\Rule;

abstract class DetalleCompraReglas implements Rule
{
    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    abstract public function passes($attribute, $value);

    abstract public function message();
}