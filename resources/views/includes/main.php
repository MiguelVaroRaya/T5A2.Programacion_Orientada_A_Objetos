<?php

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
        <h1>Seccion Comida</h1>
        <div class="card_container">
            <?php
            foreach ($ropaClases as $key => $ropa) { ?>
                <div class="card">
                    <div class="card__titulo">
                        <h3><?php echo $ropa->getNombre() ?></h3>
                    </div>
                    <div class="card__content">
                        <p>Precio: <?php echo $ropa->getPrecio() ?></p>
                        <p>Talla: <?php echo $ropa->getTalla() ?></p>
                    </div>
                    <div class="card__footer">
                        <button class="card__boton">Añadir al carrito</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="section">
        <h1>Seccion Ropa</h1>
        <div class="card_container">
        <?php
            foreach ($comidaClases as $key => $comida) { ?>
                <div class="card">
                    <div class="card__titulo">
                        <h3><?php echo $comida->getNombre() ?></h3>
                    </div>
                    <div class="card__content">
                        <p>Precio: <?php echo $comida->getPrecio() ?></p>
                        <p>Talla: <?php echo $comida->getCaducidad()->format('d-m-Y') ?></p>
                    </div>
                    <div class="card__footer">
                        <button class="card__boton">Añadir al carrito</button>
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
                    <div class="card__titulo">
                        <h3><?php echo $electronico->getNombre() ?></h3>
                    </div>
                    <div class="card__content">
                        <p>Precio: <?php echo $electronico->getPrecio() ?></p>
                        <p>Talla: <?php echo $electronico->getModelo() ?></p>
                    </div>
                    <div class="card__footer">
                        <button class="card__boton">Añadir al carrito</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>