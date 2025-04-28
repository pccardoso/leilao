<?php

    require_once("php/Administrador.class.php");
    $adm = new Administrador();
    $pag = "";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cadastrar Usuário - Leilão</title>

    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="lib/date/css/bootstrap-datepicker.css">
    <link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="box-login">

                <img src="img/logo.png" alt="">

                <h5><strong>Sistema de Leilão</strong> - Protótipo</h5>

                <div class="box-form-cad-usu">

                    <h5>Cadastrar Usuário</h5>

                    <div class="form-group">
                        <label for="usuario"><i class="bi bi-person-fill"></i> Nome completo:</label>
                        <input type="text" id="eNom" class="form-control form-control-lg" name="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">CPF: </label>
                        <input type="text" id="eCpf" class="form-control form-control-lg">
                    </div> 

                    <div class="form-group">
                        <label for="usuario"><i class="bi bi-person"></i> Usuário:</label>
                        <input type="text" class="form-control form-control-lg" id="eUsu" name="form-control">
                    </div>

                    <div class="form-group">
                        <label for="usuario"><i class="bi bi-lock-fill"></i> Senha:</label>
                        <input type="password" class="form-control form-control-lg" id="eSen" name="form-control">
                    </div>

                    <div class="form-group">
                        <label for="usuario"><i class="bi bi-telephone-fill"></i> Telefone:</label>
                        <input type="text" class="form-control form-control-lg" id="eTel" name="form-control">
                    </div>

                    <br>

                </div>

                <button class="btn btn-success btn-lg" id="btnCadUsuario"><i class="bi bi-plus-circle-fill"></i> Salvar</button>
                <a class="btn btn-danger btn-lg" href="index.php"><i class="bi bi-box-arrow-in-right"></i> Login</a>

            </div>
        </div>
    </div>
</div>


    <?php
        require_once("page/modal.php");
    ?>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/date/js/bootstrap-datepicker.js"></script>
    <script src="lib/date/locales/bootstrap-datepicker.pt-BR.min.js"></script>
    <script src="lib/jquery-masked/dist/jquery.mask.js"></script>
    <script src="js/script.js"></script>
    <script>
        $('#eTel').mask('(00) 90000-0000', {placeholder: "(99) 99999-9999"});
        $('#eCpf').mask('000.000.000-00', {placeholder: "000.000.000-00"});
    </script>
</body>
</html>