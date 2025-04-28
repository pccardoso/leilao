<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode(($adm->usu->consultar("WHERE tb_usuario.id_tb_usuario=".$_POST['eIdUsu'])));

?>