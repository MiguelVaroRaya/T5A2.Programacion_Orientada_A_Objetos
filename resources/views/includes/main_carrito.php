<?php
declare(strict_types=1);

use app\clases\Carrito;

$carrito = new Carrito();
?>

<main class="main">
    <?php $carrito->mostrarCarrito() ?>

    <form class="formulario" action="/carrito" method="post">
        <input type="submit" name="borrar" value="Vaciar Carrito"></input>
    </form>
</main>

<?php

function filtrado(string $datos): string
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos 
    $datos = stripslashes($datos); // Elimina backslashes \ 
    $datos = htmlspecialchars($datos);  // Traduce caracteres especiales en entidades HTML 
    return $datos;
}

if (isset($_POST["borrar"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    $carrito->vaciarCarrito();
    header('Location: /carrito');
}