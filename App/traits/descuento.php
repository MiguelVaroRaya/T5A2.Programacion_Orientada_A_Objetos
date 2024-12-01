<?php

namespace app\traits;

trait descuento
{
    static function hacerDescuento(float $precio): float
    {
        return $precio - $precio * 0.2;
    }
}
