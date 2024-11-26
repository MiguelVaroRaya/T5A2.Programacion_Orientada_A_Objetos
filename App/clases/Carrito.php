<?php

namespace app\clases;

class Carrito
{
    private array $productos = [];

    public function agregarProducto(Producto $producto): void
    {
        $this->productos[] = $producto;
    }

    public function eliminarProducto(string $id): void
    {
        foreach ($this->productos as $indice => $producto) {
            if ($producto->id == $id) {
                $posicion = $indice;
            }
        }

        if (!empty($posicion)) {
            unset($this->productos[$posicion]);
        }
    }
}
