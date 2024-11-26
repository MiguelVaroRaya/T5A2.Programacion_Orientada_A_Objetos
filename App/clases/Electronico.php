<?php

namespace app\clases;

class Electronico extends Producto
{

    public function __construct(private string $modelo)
    {
        parent::__construct();
    }

    public function mostrarDescripcion(): void
    {
        echo "El producto $this->nombre cuesta $this->precio euros y es el modelo $this->modelo";
    }
}
