<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->cat->cadastrar(array(
        "eNom"=> $_POST['eNom'],
        "eDes"=> $_POST['eDes']
    )));

?>