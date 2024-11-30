<?php

$request = $_SERVER['REQUEST_URI'];

$allowed_routes = [
    '/' => 'principal.php',
    '/home' => 'home.php',
    '/metodoModel' => 'metodoModel.php',
    '/carrito' => 'carrito.php',
    '/crear' => 'crear.php',
    '/crearProducto' => 'crearProducto.php'
];

if (array_key_exists($request, $allowed_routes)) {
    require $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '../resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $allowed_routes[$request];
} else {
    http_response_code(404);
    require $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '../resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . '404.php';
}