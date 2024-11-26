<?php
trait descuento
{
    function hacerDescuento(float $precio): float
    {
        return $precio - $precio * 0.2;
    }
}
