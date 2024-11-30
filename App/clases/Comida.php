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
        $fecha = $this->caducidad->format('d-m-Y');
?>
        <div class="card__titulo">
            <h3><?php echo $this->nombre ?></h3>
        </div>
        <div class="card__content">
            <p>Precio: <?php echo $this->precio ?></p>
            <p>Caducidad: <?php echo $fecha ?></p>
        </div>

<?php }

    public function getCaducidad(): DateTime
    {
        return $this->caducidad;
    }

    public function setCaducidad(int $caducidad): void
    {
        $this->caducidad = $caducidad;
    }
}
