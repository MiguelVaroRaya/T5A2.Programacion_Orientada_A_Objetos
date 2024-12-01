<?php

declare(strict_types=1);
function filtrado(string $datos): string
{
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}
function validarNombre(string $nombre): bool
{
  if (strlen($nombre) > 20 || !preg_match("/^[a-zA-Z\s]+$/", $nombre)) {
    return false;
  } else {
    return true;
  }
}

function validarModelo(string $modelo): bool
{
  if (strlen($modelo) > 20 || !preg_match("/^[a-zA-Z0-9\s]+$/", $modelo)) {
    return false;
  } else {
    return true;
  }
}

/* function tabla(array $array): void
{
  echo '<table>';
  echo '<tr><td>Id</td><td>Nombre</td><td>Precio</td><td>Talla</td></tr>';
  for ($i = 0; $i < count($array); $i++) {
    echo '<tr><td>' . $array[$i]['nombre'] . '</td><td><form action="mostrar" method="post"><input type="hidden" name="nombre" value="' . $array[$i]['nombre'] . '"><button type="submit" name="submit">Borrar</button></form></td></tr>';
  }
  echo '</table>';
} */

function validarEuros(string $cantidad):bool{
  if (preg_match('/^\d+([.,]\d{1,2})?$/', $cantidad)) {
    return true;
} else {
    return false;
}

}
function validarTalla(string $talla):bool{
  $tallas = ['S', 'M', 'L', 'XL'];

  // Verificar si el valor 'L' está en el array
  if (in_array(strtoupper($talla), $tallas)) {
      return true;
  } else {
      return false;
  }
}