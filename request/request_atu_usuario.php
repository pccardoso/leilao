<?php

    require_once("../php/Administrador.class.php");

    $adm = new Administrador();

    echo json_encode($adm->usu->atualizar(array(
        "eIdUsu"=> $_POST['eIdUsu'],
        "eNomUsuEdi"=>$_POST['eNomUsuEdi'],
        "eCpfUsuEdi"=>$_POST['eCpfUsuEdi'],
        "eUsuUsuEdi"=>$_POST['eUsuUsuEdi'],
        "eWhaUsuEdi"=>$_POST['eWhaUsuEdi'],
        "ePerUsuEdi"=>$_POST['ePerUsuEdi']
    )));

?>