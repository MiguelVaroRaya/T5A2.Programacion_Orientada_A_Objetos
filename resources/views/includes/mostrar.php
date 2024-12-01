<?php

declare(strict_types=1);

use app\clases\Electronico;

use App\Models\ProductosElectronicoModel;

$modelElectronico = new ProductosElectronicoModel();

if (isset($_GET['id'])) {
    $id = filtrado($_GET['id']);

    if (filter_var($id, FILTER_VALIDATE_INT)) {

        $electronico = $modelElectronico->select("productos.id as id", "nombre", "precio", "modelo", "id_producto")
            ->innerJoinFind("productos.id", "id_producto", intval($id));
        $electronicoObject = new Electronico($electronico["nombre"], $electronico["precio"], $electronico["id"], $electronico["modelo"]);
    } else {
        header("Location:/");
    }
}
?>


<main class="main_secciones">
    <form class="formulario" action="mostrar" method="post" enctype="multipart/form-data">
        <h1>Edición y borrado de datos de Objeto</h1>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $electronicoObject->getNombre() ?>"><br><br>
        <p class="error"><?php if (isset($errores['nombre'])) echo $errores['nombre']; ?></p>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?php echo $electronicoObject->getPrecio() ?>"><br><br>
        <p class="error"><?php if (isset($errores['precio'])) echo $errores['precio']; ?></p>
        <label for="talla">Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $electronicoObject->getModelo() ?>"><br><br>
        <p class="error"><?php if (isset($errores['talla'])) echo $errores['talla']; ?></p>
        <input type="hidden" name="id" value="<?php echo $electronicoObject->getId() ?>">
        <button type="submit" name="submit" class="card__boton">Editar</button>


        <div class="error"><?php if (isset($error)) echo $error; ?></div>
        <div class="check"><?php if (isset($mensaje)) echo $mensaje; ?></div>
    </form>
    <form action="borrar" method="POST">
        <input type="hidden" name="id" value="<?php echo $electronicoObject->getId() ?>">
        <button type="submit" class="card__boton">Borrar</button>
    </form>
</main>