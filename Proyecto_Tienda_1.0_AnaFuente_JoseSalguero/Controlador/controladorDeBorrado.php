<?php
require_once "../Modelo/DAOCliente.php";
require_once "../Modelo/DTOCliente.php";
require_once "validacionCliente.php";

session_name("sesionCliente");
session_start();

    $DAOCliente = new DAOCliente();

    if (isset($_GET["borrado"]) && $_GET["borrado"]== "true") {
        $id = $_SESSION["cliente"]->getId();
        $DAOCliente->eliminarClientePorID($id);


        $_SESSION["sesionCliente"] = array();
        session_destroy();
        header("Location: ../Vista/loginFormulario.php?aviso=Usuario eliminado correctamente");
    }
