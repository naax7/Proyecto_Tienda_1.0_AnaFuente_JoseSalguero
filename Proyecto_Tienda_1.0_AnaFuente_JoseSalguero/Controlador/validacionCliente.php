<?php
require_once "../Modelo/DAOCliente.php";
require_once "../Modelo/DTOCliente.php";

function validarFormularioLogin($nickname,$password){
    $errores = [];

    if (empty($_POST['nickname']) || empty($_POST['password'])) {
        $errores[]="No se ha establecido ninguna contraseña o usuario";
    }

    elseif (strlen($nickname) < 5 || strlen($nickname) > 30) {
        $errores[]= "El nombre debe contener solo caracteres alfanuméricos y no estar vacío.";
    }
    elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $errores[]= "La contraseña de usuario debe estar formada por 8 caracteres alfanumericos";
    }

    return $errores;

}


function validarFormularioCambioPassword($password,$anteriorPassword,$passwordActual){

    $errores = [];

    if (empty($password) || empty($anteriorPassword)) {
        $errores[]="Deben establecerse ambas contraseñas";
    }

    elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password) || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $anteriorPassword)) {
        $errores[] = "La contraseña de usuario debe estar formada por 8 caracteres alfanumericos";
    }

    elseif ($anteriorPassword != $passwordActual) {
        $errores[] = "La contraseña de usuario actual no coincide";
    }

    return $errores;

}


function validarFormularioNuevoUsuario($nombre, $apellido, $nickname, $password, $telefono, $domicilio){

    $errores = [];

    if (empty($nickname) || empty($password) || empty($nombre) || empty($apellido) || empty($telefono) || empty($domicilio)) {
        $errores[] = "Debe rellenar el formulario completo";
    }

    elseif (strlen($nickname) < 5 || strlen($nickname) > 30) {
        $errores[] = "El nombre del usuario debe estar formado por almenos 5 caracteres y maximo 30 caracteres";
    }

    elseif (strlen($telefono) != 9 || $telefono[0] === '0') {
        $errores[] = "El teléfono tiene que tener 9 caracteres exactos y no debe comenzar por 0";
    }

    elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $errores[] = "La contraseña de usuario debe estar formada por 8 caracteres alfanumericos";
    }

        return $errores;

}








