<?php

namespace app\clases;

class Ropa extends Producto
{

    public function __construct(private string $nombre, private float $precio, private int $id, private string $talla)
    {
        parent::__construct($nombre, $precio, $id);
    }

    public function mostrarDescripcion(): void
    { ?>
        <div class="card__titulo">
            <h3><?php echo $this->nombre ?></h3>
        </div>
        <div class="card__content">
            <p>Precio: <?php echo $this->precio ?></p>
            <p>Talla: <?php echo $this->talla ?></p>
        </div>
<?php }

    public function getTalla(): string
    {
        return $this->talla;
    }

    public function setTalla(int $talla): void
    {
        $this->talla = $talla;
    }
}
