<?php

namespace app\clases;

class Ropa extends Producto
{

    public function __construct(private string $talla)
    {
        parent::__construct();
    }

    public function mostrarDescripcion(): void
    {
        echo "El producto $this->nombre cuesta $this->precio euros y es la talla $this->talla";
    }
}
