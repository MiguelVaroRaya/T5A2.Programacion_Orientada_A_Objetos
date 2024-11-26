<?php

namespace app\clases;

class Electronico extends Producto
{

    public function __construct(private string $nombre, private float $precio, private int $id, private string $modelo)
    {
        parent::__construct($nombre, $precio, $id);
    }

    public function mostrarDescripcion(): void
    {
        echo "El producto $this->nombre cuesta $this->precio euros y es el modelo $this->modelo";
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(int $modelo): void
    {
        $this->modelo = $modelo;
    }
}
