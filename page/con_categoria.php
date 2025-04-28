<?php

    require_once("../php/Administrador.class.php");
    $adm = new Administrador();
    ini_set('display_errors', 1);

    $pag = "";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Consultar Categoria</title>

    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../lib/date/css/bootstrap-datepicker.css">
    <link rel="shortcut icon" href="../img/icone.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

    <?php

        require_once("menu.php");

    ?>

    <div class="container">

        <div class="box-main">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-box2-fill"></i> Categoria</li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-plus-circle-fill"></i> Consultar</li>
                </ol>
            </nav>

            <div class="row">

                <div class="col-lg-12">

                    <h3>Consultar Categoria</h3>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cód.</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-con-categoria">
                            <?php
                                $adm->cat->listarTable1();
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>

    <?php
        require_once("modal.php");
    ?>

    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/date/js/bootstrap-datepicker.js"></script>
    <script src="../lib/date/locales/bootstrap-datepicker.pt-BR.min.js"></script>
    <script src="../js/script.js"></script>
    <script>

    </script>
</body>
</html>