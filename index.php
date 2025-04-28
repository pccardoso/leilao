<?php

    require_once("php/Administrador.class.php");
    $adm = new Administrador();
    $pag = "";

    session_start();

    if(isset($_SESSION['user'])){
        if($_SESSION['user']['permissao_tb_usuario']){
            header("location: page/con_leilao.php");
        }else{
            header("location: page/index.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login - Leilão</title>

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

                <h5><strong>Sistema de Leilão</strong></h5>

                <div class="box-form-login">

                    <div class="form-group">
                        <label for="usuario"><i class="bi bi-person-fill"></i> Usuário:</label>
                        <input type="text" id="eUsu" class="form-control form-control-lg" name="form-control">
                    </div>

                    <div class="form-group">
                        <label for="usuario"><i class="bi bi-lock-fill"></i> Credencial:</label>
                        <input type="password" class="form-control form-control-lg" id="eSen" name="form-control">
                    </div>

                    <br>

                    <?php

                        if(isset($_GET['msg'])){
                            switch ($_GET['msg']) {
                                case 1: echo "<p><i class='bi bi-info-circle-fill'></i> Por favor, autentique-se!</p>"; break;
                                case 2: echo "<p><i class='bi bi-info-circle-fill'></i> Sessão finalizada com sucesso!</p>"; break;
                            }
                        }

                    ?>

                </div>

                <a href="cad_usuario.php">Cadastre-se</a> <br> <br>

                <button class="btn btn-success btn-lg" id="btnLogin"><i class="bi bi-box-arrow-in-right"></i> Entrar</button>
                <button class="btn btn-danger btn-lg" id="btnLimpar"><i class="bi bi-eraser"></i> Limpar</button>
                

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
    <script src="js/script.js"></script>
    <script>

    </script>
</body>
</html>