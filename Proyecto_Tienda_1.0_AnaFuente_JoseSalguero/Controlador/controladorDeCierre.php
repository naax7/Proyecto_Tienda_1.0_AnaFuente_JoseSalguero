<?php
session_name("sesionCliente");
session_start();

    if (isset($_GET["cierre"]) && $_GET["cierre"]== "true") {
        $_SESSION["sesionCliente"] = array();
        session_destroy();
        header("Location: ../Vista/perfil.php");
    }
