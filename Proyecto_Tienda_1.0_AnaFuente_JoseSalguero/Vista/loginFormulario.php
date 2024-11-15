<?php
require_once '../Modelo/DTOCliente.php';
require_once '../Modelo/DAOCliente.php';

session_name("sesionCliente");
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="primeraPag.css">
    <link rel="shortcut icon" href="img/redonda.png" type="image/x-icon">
</head>
<body>
<div class="wrapper">
    <nav class="encabezado">
        <ul>
            <li class="logo">
                <a href="index.php">
                    <img src="img/Logo.png" alt="logo">
                </a>
            </li>
            <li class="pagina-principal"><a href="index.php">Página principal</a></li>
            <li class="servicios"><a href="servicios.html">Servicios</a></li>
            <li class="quienes"><a href="quienes-somos.html">¿Quiénes somos?</a></li>
            <li class="contacto"><a href="contacto.html"><img src="img/contacto.png" alt=""></a></li>
            <li class="carrito"><a href="carrito.php"><img src="img/carrito.png" alt=""></a></li>
            <li class="perfil"><a href="perfil.php"><img src="img/perfil.png" alt=""></a></li>
        </ul>
    </nav>

    <div class="contenido-principal">
        <h1>Inicio de Sesión </h1>
        <br>
        <form action="../Controlador/peticionCliente.php" method="post">
            <input type="hidden" name="accion" value="login">

            <label for="nickname">Usuario</label>
            <input type="text" id="nickname" name="nickname">

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password">
            <button type="submit">Iniciar Sesion</button>
            <?php

            if (!empty($_SESSION['errores'])) {
                foreach ($_SESSION['errores'] as $error) {
                    print "<p>$error</p>";
                }
                unset($_SESSION['errores']);
            }
            ?>

            <?php if (isset($_GET['aviso'])): ?>
                <p style="color: red;"><?php echo $_GET['aviso']; ?></p>
            <?php endif; ?>
            <?php if (isset($_GET['avisoNuevoUsuario'])): ?>
                <p style="color: #0228ad;"><?php echo $_GET['avisoNuevoUsuario']; ?></p>
            <?php endif; ?>


        </form>

        <br>
        <br>

        <a href="perfil.php">volver a atrás</a>

    </div>


</div>

<footer class="footer">
    <div class="footer-contenedor">
        <div class="footer-info">
            <h3>Pie de Página</h3>
            <p>&copy; 2024 AJTECH. Todos los derechos reservados.</p>
        </div>
        <div class="footer-mapa">
            <h3>Mapa del Sitio</h3>
            <ul>
                <li><a href="index.php">Página principal</a></li>
                <li><a href="servicios.html">Servicios</a></li>
                <li><a href="quienes-somos.html">¿Quiénes somos?</a></li>
                <li><a href="contacto.html">Contacto</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
