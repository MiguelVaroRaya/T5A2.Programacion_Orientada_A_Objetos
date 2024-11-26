<?php

namespace app\clases;

use app\Interfaces\VendibleInterface;

abstract class Producto implements VendibleInterface
{

    public function __construct(private string $nombre, private float $precio, private int $id)
    {
        define('IVA', 21.0);
    }

    abstract protected function mostrarDescripcion(): void;

    public function calcularPrecioConIVA(): float
    {
        $aumento = $this->precio * (IVA / 100);

        $resultado = $this->precio + $aumento;

        return $resultado;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(int $precio): void
    {
        $this->precio = $precio;
    }
}
