<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode(($adm->pro->consultar("WHERE tb_produto.id_tb_produto=".$_POST['eIdPro'])));

?>