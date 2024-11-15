<?php
session_name("sesionCliente");
session_start();

if (isset($_SESSION['errores']) && !empty($_SESSION['errores'])) {
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
} else {
    $errores = [];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar producto</title>
    <link rel="stylesheet" href="primeraPag.css">
    <link rel="shortcut icon" href="img/redonda.png" type="image/x-icon">
    <style>
        .errores {
            border: 1px red;
            background-color: rgba(255, 0, 0, 0.1);
            padding: 10px;
            margin-bottom: 20px;
        }
        .errores ul {
            list-style-type: none;
            padding: 0;
        }
        .errores li {
            color: red;
        }
    </style>
</head>
<body>
<nav class="encabezado">
    <ul>
        <li class="logo"><img src="img/Logo.png" alt="logo"></li>
        <li class="pagina-principal"><a href="index.php">Página principal</a></li>
        <li class="servicios"><a href="servicios.html">Servicios</a></li>
        <li class="quienes"><a href="quienes-somos.html">¿Quiénes somos?</a></li>
        <li class="contacto"><a href="contacto.html"><img src="img/contacto.png" alt=""></a></li>
        <li class="carrito"><a href="carrito.php"><img src="img/carrito.png" alt=""></a></li>
        <li class="perfil"><a href="perfil.php"><img src="img/perfil.png" alt=""></a></li>
    </ul>
</nav>


<?php if (!empty($errores)): ?>
    <div class="errores">
        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="contenido-principal">
    <h1>Actualizar producto</h1><br>
<form action="../Controlador/peticionesProducto.php" method="post">
    <input type="hidden" name="accion" value="actualizar">

    <label for="IDU">ID: </label>
    <input type="text" id="IDU" name="IDU" value="<?php echo isset($_POST['IDU']) ? $_POST['IDU'] : ''; ?>"><br><br>

    <label for="nombreU">Nombre: </label>
    <input type="text" id="nombreU" name="nombreU" value="<?php echo isset($_POST['nombreU']) ? $_POST['nombreU'] : ''; ?>"><br><br>

    <label for="descripcionU">Descripción: </label>
    <input type="text" id="descripcionU" name="descripcionU" value="<?php echo isset($_POST['descripcionU']) ? $_POST['descripcionU'] : ''; ?>"><br><br>

    <label for="precioU">Precio: </label>
    <input type="text" id="precioU" name="precioU" value="<?php echo isset($_POST['precioU']) ? $_POST['precioU'] : ''; ?>"><br><br>

    <label for="urlU">URL: </label>
    <input type="file" id="urlU" name="urlU" value="<?php echo isset($_POST['urlU']) ? $_POST['urlU'] : ''; ?>"><br><br>

    <input type="submit" value="Actualizar">
    <input type="reset" value="Borrar">
    <br><br>
    <a href="perfil.php">Volver al perfil de administrador.</a>
</form>
</div>
<footer class="footer pie">
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
