<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->usu->cadastrar(array(
        "eNom"=> $_POST['eNom'],
        "eUsu"=> $_POST['eUsu'],
        "eSen"=> $_POST['eSen'],
        "eTel"=> $_POST['eTel'],
        "ePer"=> $_POST['ePer'],
        "eCpf"=> $_POST['eCpf']
    )));

?>