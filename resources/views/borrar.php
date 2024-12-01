<?php
declare(strict_types=1);
use App\Models\ProductoModel;
//instancio el model basico ya que solo tengo que borrar en producto
$model= new ProductoModel();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST["id"])){
    $model->delete(intval($_POST["id"]));
}
}
header("Location:/");