<?php
    require_once 'DTOCliente.php';
    require_once 'conexion.php';



    class DAOCliente {
        private $conexion;
        public function __construct() {
            $this->conexion = Conexion::getConn();
        }


        public function getClientePorNicknameYContrasenya($nickname, $password) {
            $consulta = "SELECT * FROM Cliente WHERE nickname = ? AND password = ? LIMIT 1";
            $statement = $this->conexion->prepare($consulta);
            $statement->bindParam(1,$nickname);
            $statement->bindParam(2,$password);
            $statement->execute();

            return $statement;


        }
        public function getClientePorID($id) {
            $consulta = "SELECT * FROM Cliente WHERE id = ?";
            $statement = $this->conexion->prepare($consulta);
            $statement->bindParam(1,$id);
            $statement->execute();
            if ($statement->rowCount() > 0){
                while ($row = $statement->fetch(PDO::FETCH_ASSOC) ){
                    echo "ID: ".$row["id"]."<br>";
                    echo "Nickname:".$row["nickname"]."<br>";
                }
            } else {
                echo "No se encontró ningún cliente con el ID proporcionado.";
            }
        }


        public function eliminarClientePorID($id) {
            $consulta = "DELETE FROM Cliente WHERE id = ?";
            $statement = $this->conexion->prepare($consulta);
            $statement->bindParam(1,$id);
            $statement->execute();

        }



        public function insert ($nombre, $apellido, $nickname, $password, $telefono, $domicilio) {
            $consulta = "INSERT INTO Cliente (nombre, apellido, nickname, password, telefono, domicilio) VALUES(?,?,?,?,?,?)";
            $statement = $this->conexion->prepare($consulta);
            $statement->bindParam(1,$nombre);
            $statement->bindParam(2,$apellido);
            $statement->bindParam(3,$nickname);
            $statement->bindParam(4,$password);
            $statement->bindParam(5,$telefono);
            $statement->bindParam(6,$domicilio);
            $statement->execute();

            header("Location: ../Vista/loginFormulario.php?aviso=Se ha creado el usuario correctamente inicie sesion con sus nuevas credenciales");
            }

        public function update ($nickname, $password) {
           $consulta = "UPDATE Cliente SET password = ? WHERE nickname = ?";
           $statement = $this->conexion->prepare($consulta);
           $statement->bindParam(1,$password);
           $statement->bindParam(2,$nickname);
           $statement->execute();
        }

        }
?>

