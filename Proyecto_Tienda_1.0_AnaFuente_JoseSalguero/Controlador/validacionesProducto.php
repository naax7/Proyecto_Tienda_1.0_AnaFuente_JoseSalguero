<?php
require_once '../Modelo/productoDAO.php';


function quitarTildes($name) {
    $search  = ['á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú'];
    $replace = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
    return str_replace($search, $replace, $name);
}
function validarPrecioPositivo($precio) {
    return is_numeric($precio) && $precio > 0;
}

// Validar que el nombre del producto no esté repetido en la base de datos
function validarNombreUnico($nombre) {
    $productoDAO = new ProductoDAO();
    $producto = $productoDAO->buscarPorNombre($nombre); // Buscar en la base de datos
    return $producto === false; // Si devuelve null, es porque no hay producto con ese nombre
}

// Generar el literal de oferta o calidad según el precio
function obtenerEtiquetaPrecio($precio) {
    if ($precio < 10) {
        return "producto de oferta";
    } elseif ($precio > 200) {
        return "producto de calidad";
    }
    return ""; // Si no es ni oferta ni calidad, no se devuelve nada
}

function validarProductoExistePorId($id, $productoDAO) {
    // Verificamos si el producto existe en la base de datos
    $producto = $productoDAO->getProductoById($id);

    // Si el producto no existe, devolver false
    if (!$producto) {
        return false; // Producto no existe
    }
    return true; // Producto existe
}

// Validar el formulario de producto completo
function validarFormularioProducto($nombre, $precio, $productoDAO) {
    $errores = [];

    // Validar que el nombre no esté vacío y contenga solo caracteres alfanuméricos y espacios
    if (empty($nombre) || !preg_match('/^[a-zA-Z0-9\s]+$/', $nombre)) {
        $errores[] = "El nombre debe contener solo caracteres alfanuméricos y no estar vacío.";
    }

    // Validar que el precio sea un valor positivo
    if (!validarPrecioPositivo($precio)) {
        $errores[] = "El precio debe ser un valor positivo.";
    }
    // Validar que el nombre sea único
    if (!validarNombreUnico($nombre)) {
        $errores[] = "El nombre del producto ya existe.";
    }

    return $errores;
}

function validarFormularioProducto2($nombre, $precio, $productoDAO) {
    $errores = [];

    // Validar que el nombre no esté vacío y contenga solo caracteres alfanuméricos y espacios
    if (empty($nombre) || !preg_match('/^[a-zA-Z0-9\s]+$/', $nombre)) {
        $errores[] = "El nombre debe contener solo caracteres alfanuméricos y no estar vacío.";
    }

    // Validar que el precio sea un valor positivo
    if (!validarPrecioPositivo($precio)) {
        $errores[] = "El precio debe ser un valor positivo.";
    }

    return $errores;
}

function validarFormularioProducto3($id) {
    $errores = [];

    if (empty($id) || !is_numeric($id)) {
        $errores[] = "ID inválido para eliminar el producto.";
    }

    return $errores;
}

