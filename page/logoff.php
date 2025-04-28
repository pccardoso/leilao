<?php

    session_start();
    unset($_SESSION["usu"]);
    session_destroy();
    header("location: ../index.php?msg=2");

?>