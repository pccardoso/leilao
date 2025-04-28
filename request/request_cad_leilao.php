<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->lei->cadastrar(array(
        "cSta"=> $_POST['cSta'],
        "eValIni"=> $_POST['eValIni'],
        "eValLan"=> $_POST['eValLan'],
        "eIdPro"=> $_POST['eIdPro']
    )));

?>