<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->usu->alterar_senha(array(
        "eIdUsu" => $_POST['eIdUsu'],
        "eSenUsu" => $_POST['eSenUsu']
    )));

?>