<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->lei->atualizar(array(
        "eIdLei"=> $_POST['eIdLei'],
        "eValLanEdi"=> $_POST['eValLanEdi'],
        "sStaLeiEdi"=> $_POST['sStaLeiEdi'],
    )));

?>