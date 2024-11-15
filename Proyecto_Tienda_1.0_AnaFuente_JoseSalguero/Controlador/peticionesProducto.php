<?php
require_once "validacionesProducto.php";
require_once "../Modelo/DAOCliente.php";
require_once "../Modelo/DTOCliente.php";
require_once "../Modelo/productoDAO.php";
require_once "../Modelo/productoDTO.php";

session_name("sesionCliente");
session_start();

$accion = $_POST['accion'];
$productoDAO = new ProductoDAO();
$productoDAO->getProductos();
$errores = [];

switch ($accion) {
    case 'insertar':
        $nombre = $_POST['nombreI'];
        $descripcion = $_POST['descripcionI'];
        $precio = $_POST['precioI'];
        $url = $_POST['urlI'];

        $errores = validarFormularioProducto($nombre, $precio, $productoDAO);
        if (empty($errores)) {
            $producto = new productoDTO($nombre, $descripcion, $precio, $_SESSION["cliente"]->getId(), $url);
            $productoDAO->insertarProducto($producto);
            header("Location: ../Vista/printTable.php");
            exit();
        }
        break;

    case 'actualizar':
        $id = $_POST['IDU'];
        $nombre = $_POST['nombreU'];
        $descripcion = $_POST['descripcionU'];
        $precio = $_POST['precioU'];
        $url = $_POST['urlU'];

        $productoExiste = validarProductoExistePorId($id, $productoDAO);

        if (!$productoExiste) {
            // Si el producto no existe, agregar un error
            $errores[] = "El producto con ID $id no existe.";
        } else {
            // Si el producto existe, continuar con la validación y actualización
            $errores = validarFormularioProducto2($nombre, $precio, $productoDAO);
            if (empty($errores)) {
                $producto = new productoDTO($nombre, $descripcion, $precio, $_SESSION["cliente"]->getId(), $url, $id);
                $productoDAO->updateProducto($producto);
                header("Location: ../Vista/printTable.php");
                exit();
            }
        }
        break;

    case 'eliminar':
        $id = $_POST['IDD'];
        // Validar que el ID no esté vacío o no sea inválido
        $errores = validarFormularioProducto3($id);
        if(empty($errores)){
            // Eliminar el producto de la base de datos
            $productoDAO->deleteProducto($id);
            // Redirigir a la página de productos después de la eliminación
            header("Location: ../Vista/printTable.php");
            exit;
        }
        break;
    default:
        $errores[] = "Acción no válida.";
        echo "<pre>Error: Acción no válida</pre>";
        exit();
}
if (!empty($errores)) {
    $_SESSION['errores'] = $errores;

    // Redirigir al formulario correspondiente según la acción
    if ($accion == 'insertar') {
        header("Location: ../Vista/insertarProducto.php");
    } elseif ($accion == 'actualizar') {
        header("Location: ../Vista/actualizarProducto.php");
    } else {
        header("Location: ../Vista/index.php");
    }
    exit();
}

