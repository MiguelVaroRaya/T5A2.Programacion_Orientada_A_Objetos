<?php

namespace app\clases;

class Ropa extends Producto
{

    public function __construct(private string $nombre, private float $precio, private int $id, private string $talla)
    {
        parent::__construct($nombre, $precio, $id);
    }

    public function mostrarDescripcion(): void
    {
        echo "El producto $this->nombre cuesta $this->precio euros y es la talla $this->talla";
    }

    public function getTalla(): string
    {
        return $this->talla;
    }

    public function setTalla(int $talla): void
    {
        $this->talla = $talla;
    }
}
