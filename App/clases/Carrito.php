<?php

namespace app\clases;

class Carrito
{
    private array $productos;

    public function __construct()
    {
        $this->productos = $_SESSION["productos"];
    }

    public function agregarProducto(Producto $producto): void
    {
        $this->productos[] = $producto;

        $_SESSION["productos"] = $this->productos;
    }

    public function eliminarProducto(string $id): void
    {
        foreach ($this->productos as $indice => $producto) {
            if ($producto->getId() == $id) {
                $posicion = $indice;
            }
        }

        if (!empty($posicion)) {
            unset($this->productos[$posicion]);
        }
    }

    public function calcularTotal(): float {
        $total = 0;

        foreach ($this->productos as $indice => $producto) {
            $total += $producto->calcularPrecioConIVA();
        }

        return $total;
    }
    
    public function vaciarCarrito(): void {
        $this->productos = [];
    }

    public function mostrarCarrito(): void {
        foreach ($this->productos as $indice => $producto) {
            $producto->mostrarDescripcion();
        }
    }
}
