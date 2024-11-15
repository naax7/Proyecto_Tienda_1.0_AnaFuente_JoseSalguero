<?php
require_once '../Modelo/DTOCliente.php';
require_once '../Modelo/DAOCliente.php';

session_name("sesionCliente");
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - AJTECH</title>
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
        </nav>

        <div class="contenido-principal">
            <?php if (!isset($_SESSION["cliente"])): ?>
                <h1>Aún no se ha iniciado la sesión</h1>
                <br>
                <br>
                <a href="loginFormulario.php">Iniciar sesion</a>
                <br>
                <br>
                <a href="loginFormularioNuevoUsuario.php">Crear Usuario</a>
            <?php else: ?>
                <h1><?= $_SESSION["cliente"]->getNickname() ?></h1>
                <br>
                <p>Nombre: <?= $_SESSION["cliente"]->getNombre() ?></p>
                <p>Apellido: <?= $_SESSION["cliente"]->getApellido() ?></p>
                <p>Teléfono: +<?= $_SESSION["cliente"]->getTelefono() ?></p>
                <p>Dirección: <?= $_SESSION["cliente"]->getDomicilio() ?></p>
                <br>
                <br>
                <a href="loginFormularioCambioPassword.php">Cambiar Contraseña</a>
                <?php if (isset($_GET["avisoNuevoPassword"])): ?>
                    <p><?= $_GET["avisoNuevoPassword"] ?></p>
                <?php endif; ?>
                <br>
                <br>
                <a href="printTable.php">Gestor de Productos</a>
                <br>
                <br>
                <a href="../Controlador/controladorDeCierre.php?cierre=true">Cerrar sesión</a>
                <br>
                <br>
                <a href="../Controlador/controladorDeBorrado.php?borrado=true">Eliminar Sesión</a>

            <?php endif; ?>


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
    </div>
</body>
</html>
