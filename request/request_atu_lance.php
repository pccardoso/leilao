<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->lei->consultarLance($_POST['eIdLei']));

?>