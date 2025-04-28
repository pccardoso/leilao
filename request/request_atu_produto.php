<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->pro->atualizar(array(
        "eNomProEdi"=> $_POST['eNomProEdi'],
        "eDesProEdi"=> $_POST['eDesProEdi'],
        "eValProEdi"=> $_POST['eValProEdi'],
        "eIdPro" => $_POST['eIdPro']
    )));

?>