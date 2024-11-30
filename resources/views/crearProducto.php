<?php

declare(strict_types=1);
require_once 'funciones.php';

use App\Models\ProductosRopaModel; // Recuerda el uso del autoload.php
use App\Models\ProductosElectronicoModel;
use App\Models\ProductosComidaModel;


if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre_existe = false;
  $nombre = filtrado($_POST["nombre"]);

  if (empty($nombre)) {
    $errores['nombre'] = "Nombre no introducido.";
  } elseif (validarNombre($nombre)) {
    $datos['nombre'] = $nombre;
  } else {
    $errores['nombre'] = "Formato nombre incorrecto";
  }

  $precio = filtrado($_POST["precio"]);

  if (empty($precio)) {
    $errores['precio'] = "precio no introducido";
  } elseif (validarEuros($precio)) {
    $datos['precio'] = $precio;
  } else {
    $errores['precio'] = "Precio no valido";
  }

  $talla = filtrado($_POST["talla"]);

  if (empty($talla)) {
    $errores['talla'] = "talla no introducido";
  } elseif (validarTalla($talla)) {
    $datos['talla'] = $talla;
  } else {
    $errores['talla'] = "Talla no valida";
  }

  if (empty($errores)) {
    $ropaModel = new ProductosRopaModel();
    $resultado = $ropaModel->crearProducto(['nombre' => $datos['nombre'],'precio'=>$datos['precio']], ['talla' => $datos['talla']]);
    $mensaje = $resultado;
  }
}
