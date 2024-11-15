<?php
    require_once "../Modelo/productoDTO.php";
    require_once "../Modelo/productoDAO.php";
    require_once "../Modelo/DTOCliente.php";


session_name("sesionCliente");
session_start();

    if ( !isset($_SESSION["productosCarrito"])){
        $_SESSION["productosCarrito"] = [];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - AJTECH</title>
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
            <h1>Tu Carrito de Compras</h1>
            <br>
            <div class="productos-contenedor">
                    <?php if (empty($_SESSION["productosCarrito"])): ?>
                        <p>Actualmente no hay productos en tu carrito. Explora nuestra tienda y agrega algunos productos a tu carrito.</p>
                    <?php else: ?>
                        <div class="cajasProducto">
                            <?php foreach ($_SESSION["productosCarrito"] as $producto): ?>
                                <a href="detalleProducto.php?id=<?= $producto->getId() ?>">
                                    <div class="producto">
                                        <img src="<?php echo $producto->getUrl(); ?>" alt="<?php echo $producto->getNombre(); ?>" />
                                        <h3><?php echo $producto->getNombre(); ?></h3>
                                        <p>Precio: <?php echo number_format($producto->getPrecio(), 2); ?> €</p>
                                        <form action="../Controlador/controladorCarrito.php" method="post">
                                            <input type="hidden" name="eliminarProducto" value="<?= $producto->getId() ?>">
                                            <input type="submit" value="Eliminar del carrito">
                                        </form>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
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
    </div>
</body>
</html>
