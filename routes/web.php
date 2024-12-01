<?php

$request = $_SERVER['REQUEST_URI'];

if (str_contains($request, "?")) {
    $array = explode("?", $request);
    $request = $array[0];
}


$allowed_routes = [
    '/' => 'principal.php',
    '/home' => 'home.php',
    '/metodoModel' => 'metodoModel.php',
    '/carrito' => 'carrito.php',
    '/crear' => 'crear.php',
    '/crearProducto' => 'crearProducto.php',
    '/mostrar' => 'mostrar.php',
    '/borrar' => 'borrar.php',
    '/editar' => 'editar.php',
    '/procedimiento' => 'procedimiento.php'
];

if (array_key_exists($request, $allowed_routes)) {
    require $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '../resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $allowed_routes[$request];
} else {
    http_response_code(404);
    require $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '../resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . '404.php';
}