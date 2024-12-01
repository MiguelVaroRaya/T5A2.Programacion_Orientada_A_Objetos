<?php

declare(strict_types=1);

use app\clases\Carrito;

ob_start();

$carrito = new Carrito();
?>

<main class="main">
    <?php $carrito->mostrarCarrito() ?>

    <form class="formulario" action="/carrito" method="post">
        <input type="submit" name="borrar" value="Vaciar Carrito"></input>
    </form>

    <button class="formulario"><h2>Total : <?php  echo $carrito->calcularTotal(); ?></h2></button>
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

if (isset($_POST["borrarProducto"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $key = filtrado($_POST["key"]);

    if (empty($key) || !preg_match('/^\d{1,3}$/', $key)) {
        echo "Error al eliminar al carrito";
    } else {
        $carrito->eliminarProducto($key);
        header('Location: /carrito');
    }
}

ob_end_flush();
