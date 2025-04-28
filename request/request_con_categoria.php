<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode(($adm->cat->consultar("WHERE tb_categoria.id_tb_categoria=".$_POST['eIdCat'])));

?>