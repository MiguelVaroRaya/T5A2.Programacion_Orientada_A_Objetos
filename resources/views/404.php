<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página no encontrada</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #333;
            text-align: center;
            margin: 0;
        }

        .error-container {
            max-width: 600px;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .error-container h1 {
            font-size: 4em;
            color: #ff5e8e;
            margin: 0;
        }

        .error-container h2 {
            font-size: 1.5em;
            margin: 10px 0;
        }

        .error-container p {
            font-size: 1.1em;
            margin: 20px 0;
        }

        .error-container a {
            text-decoration: none;
            color: #ffffff;
            background-color: #ff5e8e;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .error-container a:hover {
            background-color: #ff5e8e;
        }

        .icon {
            font-size: 6em;
            color: #ff5e8e;
        }
    </style>
</head>

<body>
    <div class="error-container">
        <i class="fas fa-exclamation-triangle icon"></i>
        <h1>404</h1>
        <h2>¡Página no encontrada!</h2>
        <p>Lo sentimos, pero la página que estás buscando no existe o ha sido movida.</p>
        <a href="/">Volver a la página de inicio</a>
    </div>
</body>

</html>
