<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->lei->excluir($_POST['eIdLei']));

?>