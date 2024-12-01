<?php

namespace app\clases;

class Electronico extends Producto
{

    public function __construct(private string $nombre, private float $precio, private int $id, private string $modelo)
    {
        parent::__construct($nombre, $precio, $id);
    }

    public function mostrarDescripcion(): void
    { ?>
        <div class="card__titulo">
            <h3><?php echo $this->nombre ?></h3>
        </div>
        <div class="card__content">
            <p>Precio: <?php echo $this->calcularPrecioConIVA() ?></p>
            <p>Modelo: <?php echo $this->modelo ?></p>
        </div>
<?php }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(int $modelo): void
    {
        $this->modelo = $modelo;
    }
}
