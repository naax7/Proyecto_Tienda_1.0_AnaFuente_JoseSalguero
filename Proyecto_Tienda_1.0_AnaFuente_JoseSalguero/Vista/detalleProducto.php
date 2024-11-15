<?php
require_once "../Modelo/productoDAO.php";
require_once "../Controlador/validacionesProducto.php";

session_name("sesionCliente");
session_start();


if (isset($_GET['id'])) {
    $productoID = $_GET['id'];


    $productoDAO = new ProductoDAO();


    $producto = $productoDAO->getProductoById($productoID);
}
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles Producto</title>
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
<?php if ($producto) : ?>
    <h1>Detalles del Producto</h1>
    <br>
    <br>
    <p><strong>Nombre:</strong> <?= $producto->getNombre() ?></p>
    <p><strong>Descripción:</strong> <?= $producto->getDescripcion() ?></p>
    <p><strong>Precio:</strong> <?= $producto->getPrecio() ?>€</p>




    <?php

    $etiqueta = obtenerEtiquetaPrecio($producto->getPrecio());
    if ($etiqueta) : ?>
        <p><strong>Etiqueta:</strong> <?= $etiqueta ?></p>
    <?php endif; ?>
    <br>
    <br>
    <p>
        <img class="imgDetalles" src="<?php echo $producto->getUrl(); ?>" alt="<?= $producto->getNombre() ?>">
    </p>
    <br><br>
    <form action="../Controlador/controladorCarrito.php" method="post">
        <input type="hidden" name="idProducto" value="<?= $producto->getId() ?>">
        <input type="submit" value="Enviar Al Carrito">
    </form>
<?php else : ?>
    <p>Producto no encontrado.</p>
<?php endif; ?>
        <br><a href="index.php">Volver a la página principal</a>
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


