<?php

namespace app\clases;

use DateTime;

class Comida extends Producto
{

    public function __construct(private DateTime $caducidad)
    {
        parent::__construct();
    }

    public function mostrarDescripcion(): void
    {
        echo "El producto $this->nombre cuesta $this->precio euros y caduca en la fecha $this->caducidad";
    }
}