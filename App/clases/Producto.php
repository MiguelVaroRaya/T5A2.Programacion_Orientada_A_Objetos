<?php

namespace app\clases;

use app\Interfaces\VendibleInterface;

abstract class Producto implements VendibleInterface
{
    private string $id;

    public function __construct(private string $nombre, private float $precio)
    {
        define('IVA', 21.0);
    }

    abstract protected function mostrarDescripcion(): void;

    public function calcularPrecioConIVA(): float
    {
        $aumento = $this->precio * (IVA/100);

        $resultado = $this->precio + $aumento;

        return $resultado;
    }
}
