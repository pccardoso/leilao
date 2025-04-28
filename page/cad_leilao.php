<?php

    require_once("../php/Administrador.class.php");
    $adm = new Administrador();

    $pag = "";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cadastrar Leilão</title>

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

        <div class="box-main box-cad-categoria">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-currency-dollar"></i> Leilão</li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-plus-circle-fill"></i> Cadastrar</li>
                </ol>
            </nav>

            <div class="row">

                <div class="col-lg-6">

                    <h3>Cadastrar Leilão</h3>

                    <div class="row">

                        <div class="row">
                            <div class="form-group">
                                <input type="number" id="eIdPro" class="form-control" placeholder="Código do produto...">
                            </div>
                        </div>

                        

                        <div class="row" style="display:none" id="box-form-lei">

                            <div class="col-lg-12">
                                <div class="result-search-pro">
                                    
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Valor Inicial do Leilão (R$):</label>
                                    <input type="text" id="eValIni" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Valor por Lance (R$):</label>
                                    <input type="text" id="eValLan" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-check form-switch">
                                    <br>
                                    <input class="form-check-input" type="checkbox" role="switch" id="cSta" checked>
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Aceitar lances</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <br>
                                <button class="btn btn-primary" id="btnCadLei"><i class="bi bi-check-circle-fill"></i> Cadastrar</button>
                                <button class="btn btn-danger"><i class="bi bi-eraser-fill"></i> Limpar</button>
                            </div>
                        </div>

                    </div>

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