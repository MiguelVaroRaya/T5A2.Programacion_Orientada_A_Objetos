<?php

declare(strict_types=1);
require_once 'funciones.php';

use App\Models\ProductosRopaModel; // Recuerda el uso del autoload.php
use App\Models\ProductosElectronicoModel;
use App\Models\ProductosComidaModel;


if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  $id = filtrado($_POST['id']);
  if (empty($id)) {
    $errores['id'] = "id no introducido.";
  } elseif (filter_var($id, FILTER_VALIDATE_INT)) {
    $datos['id'] = $id;
  } else {
    $errores['id'] = "Formato id incorrecto";
  }

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

  $modelo = filtrado($_POST["modelo"]);

  if (empty($modelo)) {
    $errores['modelo'] = "modelo no introducido";
  } elseif (validarModelo($modelo)) {
    $datos['modelo'] = $modelo;
  } else {
    $errores['modelo'] = "Modelo no valido";
  }

  if (empty($errores)) {
    $electronicoModel = new ProductosElectronicoModel();
    $resultado = $electronicoModel->actualizarDatos(['id' => $datos['id'], 'nombre' => $datos['nombre'], 'precio' => $datos['precio'], 'modelo' => $datos['modelo']]);
    $mensaje = $resultado;
    header('Location:/');
  } else {
    header('Location:/mostrar?id=' . $datos['id']);
  }
}
