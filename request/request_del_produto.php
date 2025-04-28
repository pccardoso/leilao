<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->pro->excluir($_POST['eIdPro']));

?>