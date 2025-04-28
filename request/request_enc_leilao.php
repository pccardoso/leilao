<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->lei->encerrarLeilao(array(
        "staLei"=> $_POST["staLei"],
        "eIdLei"=> $_POST["eIdLei"]
    )));

?>