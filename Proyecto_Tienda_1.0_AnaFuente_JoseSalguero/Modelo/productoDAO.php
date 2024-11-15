<?php
require_once "conexion.php";
require_once "productoDTO.php";
class productoDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Conexion::getConn();
    }
    public function getProductos()
    {
        $query = "SELECT * FROM Producto";
        $result = $this->conn->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArrayProductos()
    {
        // Limpia el arreglo de productos en la sesión
        $productos = [];

        $sql = "SELECT * FROM Producto";
        $result = $this->conn->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $producto = new productoDTO($row["nombre"], $row["descripcion"], $row["precio"], $row["cliente_id"], $row["url"], $row["id"]);
                $productos[] = $producto;
            }
        }
        return $productos;
    }

    public function insertarProducto($producto)
    {
        $nombre = $producto->getNombre();
        $descripcion = $producto->getDescripcion();
        $precio = $producto->getPrecio();
        $cliente_id = $producto->getClienteId();
        $url = "../Vista/img/".$producto->getUrl();
        $stmt = $this->conn->prepare("INSERT INTO Producto (nombre, descripcion, precio, cliente_id, url) VALUES (:nombre, :descripcion, :precio, :cliente_id, :url)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':url', $url);
        $stmt->execute();
    }

    public function updateProducto($producto)
    {
        $id = $producto->getId();
        $nombre = $producto->getNombre();
        $descripcion = $producto->getDescripcion();
        $precio = $producto->getPrecio();
        $cliente_id = $producto->getClienteId();
        $url = "../Vista/img/".$producto->getUrl();
        $stmt = $this->conn->prepare("UPDATE Producto SET nombre = :nombre, descripcion = :descripcion, precio = :precio, cliente_id = :cliente_id, url = :url WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':url', $url);
        $stmt->execute();

    }

    public function deleteProducto($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM Producto WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // En productoDAO.php
    public function buscarPorNombre($nombre){
        $query = "SELECT * FROM Producto WHERE nombre = :nombre LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Si existe, devuelve el producto, si no, devuelve null
    }


    public function getProductoById($id){
        $producto = null;
        $stmt = $this->conn->prepare("SELECT * FROM Producto WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $producto = new productoDTO($row["nombre"], $row["descripcion"], $row["precio"], $row["cliente_id"], $row["url"], $row["id"]);
            }

        }
        return $producto;
    }
}