<?php

declare(strict_types=1);

use app\clases\Carrito;
use app\clases\Comida;
use app\clases\Electronico;
use app\clases\Ropa;
use App\Models\ProductosComidaModel;
use App\Models\ProductosElectronicoModel;
use App\Models\ProductosRopaModel;

$modelRopa = new ProductosRopaModel();
$modelComida = new ProductosComidaModel();
$modelElectronico = new ProductosElectronicoModel();

$ropaTotal = $modelRopa->select("productos.id as id", "nombre", "precio", "talla", "id_producto")->innerJoin("productos.id", "id_producto");
foreach ($ropaTotal as $key => $ropa) {
    $ropaClases[] = new Ropa($ropa["nombre"], $ropa["precio"], $ropa["id"], $ropa["talla"]);
}

$comidaTotal = $modelComida->select("productos.id as id", "nombre", "precio", "caducidad", "id_producto")->innerJoin("productos.id", "id_producto");
foreach ($comidaTotal as $key => $comida) {
    $fecha = new DateTime($comida["caducidad"]);
    $comidaClases[] = new Comida($comida["nombre"], $comida["precio"], $comida["id"], $fecha);
}

$electronicoTotal = $modelElectronico->select("productos.id as id", "nombre", "precio", "modelo", "id_producto")->innerJoin("productos.id", "id_producto");
foreach ($electronicoTotal as $key => $electronico) {
    $electronicoClases[] = new Electronico($electronico["nombre"], $electronico["precio"], $electronico["id"], $electronico["modelo"]);
}

?>

<main class="main">
    <section class="section">
        <h1>Seccion Ropa</h1>
        <div class="card_container">
            <?php
            foreach ($ropaClases as $key => $ropa) { ?>
                <div class="card">
                    <?php $ropa->mostrarDescripcion() ?>
                    <div class="card__footer">
                        <form action="/" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $ropa->getId() ?>">
                            <button type="submit" name="agregarRopa" class="card__boton">Añadir al carrito</button>
                        </form>
                        <button class="card__boton">Borrar</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="section">
        <h1>Seccion Comida</h1>
        <div class="card_container">
            <?php
            foreach ($comidaClases as $key => $comida) { ?>
                <div class="card">
                    <?php $comida->mostrarDescripcion() ?>
                    <div class="card__footer">
                        <form action="/" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $comida->getId() ?>">
                            <button type="submit" name="agregarComida" class="card__boton">Añadir al carrito</button>
                        </form>
                        <button class="card__boton">Borrar</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="section">
        <h1>Seccion Electrónica</h1>
        <div class="card_container">
            <?php
            foreach ($electronicoClases as $key => $electronico) { ?>
                <div class="card">
                <?php $electronico->mostrarDescripcion() ?>
                    <div class="card__footer">
                        <form action="/" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo $electronico->getId() ?>">
                            <button type="submit" name="agregarElectronico" class="card__boton">Añadir al carrito</button>
                        </form>
                        <button class="card__boton">Borrar</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>

<?php

function filtrado(string $datos): string
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos 
    $datos = stripslashes($datos); // Elimina backslashes \ 
    $datos = htmlspecialchars($datos);  // Traduce caracteres especiales en entidades HTML 
    return $datos;
}

$carrito = new Carrito();

if (isset($_POST["agregarRopa"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filtrado($_POST["id"]);

    if (empty($id) || !preg_match('/^\d{1,3}$/', $id)) {
        echo "Error al añadir al carrito";
    } else {
        foreach ($ropaClases as $key => $ropa) {
            if ($ropa->getId() == $id) {
                $agregar = $ropa;
            }
        }
        if (isset($agregar)) {
            $carrito->agregarProducto($agregar);
        }
    }
}

if (isset($_POST["agregarComida"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filtrado($_POST["id"]);

    if (empty($id) || !preg_match('/^\d{1,3}$/', $id)) {
        echo "Error al añadir al carrito";
    } else {
        foreach ($comidaClases as $key => $comida) {
            if ($comida->getId() == $id) {
                $agregar = $comida;
            }
        }
        if (isset($agregar)) {
            $carrito->agregarProducto($agregar);
        }
    }
}

if (isset($_POST["agregarElectronico"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filtrado($_POST["id"]);

    if (empty($id) || !preg_match('/^\d{1,3}$/', $id)) {
        echo "Error al añadir al carrito";
    } else {
        foreach ($electronicoClases as $key => $electronico) {
            if ($electronico->getId() == $id) {
                $agregar = $electronico;
            }
        }
        if (isset($agregar)) {
            $carrito->agregarProducto($agregar);
        }
    }
}
