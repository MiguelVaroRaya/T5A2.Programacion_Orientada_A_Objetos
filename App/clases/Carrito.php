<?php
namespace app\clases;

class Carrito {
    private array $productos = [];

    public function agregarProducto(Producto $producto): void {
        $this->productos[] = $producto;
    }
}