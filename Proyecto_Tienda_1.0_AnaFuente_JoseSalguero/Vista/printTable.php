<?php
require_once "../Modelo/productoDAO.php";

$productoDAO = new ProductoDAO();
$productos = $productoDAO->getProductos();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabla Productos</title>
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
<h1>Lista de Productos</h1>
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Cliente ID</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($productos as $producto) : ?>
        <tr>
            <td><?= htmlspecialchars($producto['id']) ?></td>
            <td><a href="detalleProducto.php?id=<?= urlencode($producto['id']) ?>"><?= htmlspecialchars($producto['nombre']) ?></a></td>
            <td><?= htmlspecialchars($producto['descripcion']) ?></td>
            <td><?= htmlspecialchars($producto['precio']) ?></td>
            <td><?= htmlspecialchars($producto['cliente_id']) ?></td>
            <td>
                <form action="../Controlador/peticionesProducto.php" method="post" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                    <input type="hidden" name="accion" value="eliminar">
                    <input type="hidden" name="IDD" value="<?= $producto['id'] ?>">
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
    <br><a href="insertarProducto.php">Insertar Producto.</a>
    <br>
    <br>
    <a href="actualizarProducto.php">Actualizar Producto.</a>
    <br>
    <br>
    <a href="perfil.php">Volver al perfil de usuario.</a>
    <br>
    <br>
    <a href="index.php">Volver al menú principal.</a>


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



