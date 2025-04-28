<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode(($adm->lei->consultar("WHERE tb_leilao.tb_leilao=".$_POST['eIdLei'])));

?>