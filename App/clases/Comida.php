<?php

namespace app\clases;

use DateTime;

class Comida extends Producto
{

    public function __construct(private string $nombre, private float $precio, private int $id, private DateTime $caducidad)
    {
        parent::__construct($nombre, $precio, $id);
    }

    public function mostrarDescripcion(): void
    {
        echo "El producto $this->nombre cuesta $this->precio euros y caduca en la fecha $this->caducidad";
    }

    public function getCaducidad(): DateTime
    {
        return $this->caducidad;
    }

    public function setCaducidad(int $caducidad): void
    {
        $this->caducidad = $caducidad;
    }
}
