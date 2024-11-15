<?php

require_once "../Modelo/DAOCliente.php";
require_once "../Modelo/DTOCliente.php";
require_once "validacionCliente.php";

session_name("sesionCliente");
session_start();


$accion = $_POST['accion'];
$clienteDAO = new DAOCliente();
$errores = [];


switch ($accion) {
    case "login":
        $nickname = $_POST['nickname'];
        $password = $_POST['password'];

        $errores = validarFormularioLogin($nickname, $password);

        if (empty($errores)) {
            $statement = $clienteDAO->getClientePorNicknameYContrasenya($nickname, $password);

            if ($statement->rowCount() > 0){
                while ($row = $statement->fetch(PDO::FETCH_ASSOC) ){
                    $_SESSION["cliente"] = new DTOCliente($row['id'],$row['nombre'],$row['apellido'],$row['nickname'],$row['password'],$row['telefono'],$row['domicilio']);
                }
                header("Location: ../Vista/perfil.php");
                exit();
            }
            else{
                header("location:../Vista/loginFormulario.php?aviso=usuario no encontrado en la base de datos");
                exit();
            }
        }

        break;



    case "cambio":
        $password = $_POST["password"];
        $anteriorPassword = $_POST["anteriorPassword"];

        $errores = validarFormularioCambioPassword($password, $anteriorPassword ,$_SESSION["cliente"]->getPassword());

        if (empty($errores)) {
            $clienteDAO->update($_SESSION["cliente"]->getNickname(), $password);
            header("Location: ../Vista/perfil.php?avisoNuevoPassword=Password actualizada correctamente");
            exit();
        }


        break;


    case "insertarUsuario":

        $nickname = $_POST['nickname'];
        $password = $_POST['password'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $domicilio = $_POST['domicilio'];

        $errores = validarFormularioNuevoUsuario($nombre, $apellido, $nickname, $password, $telefono, $domicilio);

        if (empty($errores)) {
            $clienteDAO->insert($nombre, $apellido, $nickname, $password, $telefono, $domicilio);
        }

        header("Location: ../Vista/loginFormulario.php?avisoNuevoUsuario=Usuario creado exitosamente introduzca sus nuevas credenciales");
        exit();


    default:
        $errores[] = "Acción no válida.";
        echo "<pre>Error: Acción no válida</pre>";
        exit();
    }

    if (!empty($errores)){
        $_SESSION['errores'] = $errores;
        if ($accion == "login" ){
            header("location: ../Vista/loginFormulario.php");
            exit();
        }
        elseif ($accion == "cambio" ){
            header("location: ../Vista/loginFormularioCambioPassword.php");
            exit();
        }
        elseif ($accion == "insertarUsuario" ){
            header("location: ../Vista/loginFormularioNuevoUsuario.php");
            exit();
        }
    }









