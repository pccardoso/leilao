<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    $usu = $adm->usu->login(array(
        "eUsu"=> $_POST["eUsu"],
        "eSen"=> $_POST["eSen"]
    ));

    if(isset($usu[2])){
        session_start();
        $_SESSION["user"] = $usu[2];
    }

    echo json_encode($usu);

?>