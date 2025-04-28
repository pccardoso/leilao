<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->cat->atualizar(array(
        "eIdCat"=> $_POST['eIdCat'],
        "eNomCatEdi"=> $_POST['eNomCatEdi'],
        "eDesCatEdi"=> $_POST['eDesCatEdi']
    )));

?>