<?php
require_once "../Modelo/productoDAO.php";
require_once "../Modelo/productoDTO.php";
require_once "../Controlador/validacionesProducto.php";

session_name("sesionCliente");
session_start();

if (!isset($_SESSION["productos"])) {
    $_SESSION["productos"] = array();
}
$productoDAO = new productoDAO();
$_SESSION["productos"] = $productoDAO->getArrayProductos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJTECH</title>
    <link rel="stylesheet" href="primeraPag.css">
    <link rel="shortcut icon" href="img/redonda.png" type="image/x-icon">
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
    <div class="contenido-principal">
        <div class="container">
            <ul class="slider">
                <li id="slide1">
                    <img src="img/1.jpg" alt="">
                </li>
                <li id="slide2">
                    <img src="img/2.jpg" alt="">
                </li>
                <li id="slide3">
                    <img src="img/3.jpg" alt="">
                </li>
                <li id="slide4">
                    <img src="img/4.jpg" alt="">
                </li>
                <li id="slide5">
                    <img src="img/5.jpg" alt="">
                </li>
                <li id="slide6">
                    <img src="img/6.jpg" alt="">
                </li>
            </ul>
            <ul class="menuSlider">
                <li>
                <a href="#slide1">1</a> 
                </li>
                <li>
                    <a href="#slide2">2</a> 
                </li>
                <li>
                    <a href="#slide3">3</a> 
                </li>
                <li>
                    <a href="#slide4">4</a> 
                </li>
                <li>
                    <a href="#slide5">5</a> 
                </li>
                <li>
                    <a href="#slide6">6</a> 
                </li>
            </ul>
        </div>
    </div>
    <div id="productos" class="productos">
        <h2>Nuestros Productos</h2>
        <div class="productos-contenedor">
            <div class="cajasProducto">
                <?php foreach ($_SESSION["productos"] as $producto) : ?>
                    <a href="detalleProducto.php?id=<?= $producto->getId()?>">
                        <div class="producto" id="<?= $producto->getNombre() ?>">
                            <img src="<?php echo $producto->getUrl(); ?>" alt="<?= $producto->getNombre() ?>">
                            <h3> <?= $producto->getNombre() ?> </h3>
                            <p>Precio: <?= $producto->getPrecio() ?> €</p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

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
                    <li><a href="#productos">Nuestros Productos</a></li>
                    <li><a href="contacto.html">Contacto</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>