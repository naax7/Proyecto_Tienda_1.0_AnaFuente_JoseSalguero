<?php
require_once "../Modelo/productoDAO.php";
require_once "../Modelo/productoDTO.php";


    session_name("sesionCliente");
    session_start();


    $DAOCarrito = new ProductoDAO();

    if (!isset($_SESSION["productosCarrito"])) {
        $_SESSION["productosCarrito"] = array();
    }

if (isset($_POST["idProducto"])) {
    $idProducto = $_POST["idProducto"];
    $producto = $DAOCarrito->getProductoById($idProducto);
    $_SESSION['productosCarrito'][] = $producto;

    header("Location: ../Vista/index.php");
    exit();
}


if (isset($_POST["eliminarProducto"])) {
    $idProducto = $_POST["eliminarProducto"]; // Capturamos el ID del producto a eliminar

    foreach ($_SESSION['productosCarrito'] as $indice => $producto) {
        // Comparamos el ID del producto en el carrito con el que queremos eliminar
        if ($producto->getId() == $idProducto) {
            unset($_SESSION['productosCarrito'][$indice]);
            $_SESSION['productosCarrito'] = array_values($_SESSION['productosCarrito']);
            break;
        }
    }

    // Redireccionamos de vuelta al carrito
    header("Location: ../Vista/carrito.php");
    exit();
}



