<main class="main_secciones">
<form class="formulario" action="crear" method="post" enctype="multipart/form-data">
        <h1>Creación de Objeto</h1>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre"><br><br>
            <p class="error"><?php if (isset($errores['nombre'])) echo $errores['nombre']; ?></p>
            <label for="precio">Precio:</label>
            <input type="text" name="precio"><br><br>
            <p class="error"><?php if (isset($errores['precio'])) echo $errores['precio']; ?></p>
            <label for="talla">Talla:</label>
            <input type="text" name="talla"><br><br>
            <p class="error"><?php if (isset($errores['talla'])) echo $errores['talla']; ?></p>
            
            <button type="submit" name="submit" class="card__boton">Registrar</button>
            

            <div class="error"><?php if (isset($error)) echo $error; ?></div>
            <div class="check"><?php if (isset($mensaje)) echo $mensaje; ?></div>
        </form>
</main>