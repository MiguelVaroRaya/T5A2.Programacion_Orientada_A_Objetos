<header class="mainHeader">
    <div class="header-container">
        <div class="logo-container">
            <img src="imagenes/logo.png" alt="Logo de la página" class="logo">
        </div>
        <div class="search-login-container">
            <div class="login">

                <!--En este codigo lo que hago es poner el nombre del usuario si la sesion esta iniciada,
                si no esta iniciada nos aparecera "Identificarse" que me lleva a la pagina de registro-->
                <?php if (isset($_SESSION["usuario"])) : ?>
                    <a href="/home"> <img src="imagenes/login-icon.png" alt="Inicio de sesión" class="logos"> </a>
                    <span class="login-text"><?php echo $_SESSION["usuario"]; ?></span>
                <?php else : ?>
                    <a href="/login"> <img src="imagenes/login-icon.png" alt="Inicio de sesión" class="logos"> </a>
                    <span class="login-text">Identificarse</span>
                <?php endif; ?>

            </div>
            <div class="login">
                <img src="imagenes/logo-idioma.png" alt="Seleccion de idioma" class="logos">
                <span class="language">ES</span>
            </div>
        </div>
    </div>
</header>