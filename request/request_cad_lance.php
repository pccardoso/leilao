<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->lei->cadastrarLance(array(
        "eIdLei"=> $_POST['eIdLei'],
        "eValLan"=> $_POST['eValLan'],
        "eIdUsu"=> $_POST['eIdUsu']
    )));

?>