<?php

namespace app\clases;

use app\Interfaces\VendibleInterface;

class Producto implements VendibleInterface
{
    public function __construct(private string $id, private string $nombre, private float $precio)
    {
        define('IVA', 21.0);
    }

    public function calcularPrecioConIVA(): float
    {
        return 0;
    }
}
