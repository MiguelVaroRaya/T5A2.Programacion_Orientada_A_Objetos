<?php
declare(strict_types=1);

use app\clases\Carrito;

$carrito = new Carrito();
?>

<main class="main">
    <?php $carrito->mostrarCarrito() ?>
    
</main>