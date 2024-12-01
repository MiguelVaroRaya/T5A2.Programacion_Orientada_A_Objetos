<?php

namespace app\clases;

use app\clases\Producto;
use app\clases\Ropa;

class Carrito
{
    public array $productos;

    public function __construct()
    {
        require_once 'Ropa.php';
        $this->productos = $_SESSION["productos"] ?? [];
    }

    public function agregarProducto(Producto $producto): void
    {
        $this->productos[] = $producto;

        $_SESSION["productos"] = $this->productos;
    }

    public function eliminarProducto(string $id): void
    {
        $posicion = null;
        foreach ($this->productos as $indice => $producto) {
            if ($producto->getId() == $id) {
                $posicion = $indice;
            }
        }

        if ($posicion !== null) {
            unset($this->productos[$posicion]);

            $_SESSION["productos"] = $this->productos;
        }
    }

    public function calcularTotal(): float
    {
        $total = 0;

        foreach ($this->productos as $indice => $producto) {
            $total += $producto->calcularPrecioConIVA();
        }

        return $total;
    }

    public function vaciarCarrito(): void
    {
        $this->productos = [];
        unset($_SESSION["productos"]);
    }

    public function mostrarCarrito(): void
    {
        if (empty($this->productos)) {
            echo "El carrito está vacío.";
        } else {
?>
            <section class="section">
                <div class="card_container"> 
                    <?php foreach ($this->productos as $key => $producto) {?>
                        <div class="card">
                            <?php $producto->mostrarDescripcion(); ?>
                            <div class="card__footer">
                                <form action="/carrito" method="post">
                                    <input type="hidden" name="key" id="key" value="<?php echo $producto->getId() ?>">
                                    <button type="submit" name="borrarProducto" class="card__boton">Borrar</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>
<?php }
    }
}
