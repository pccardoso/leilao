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

    <title>Editar Informações - Leilão</title>

    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../lib/date/css/bootstrap-datepicker.css">
    <link rel="shortcut icon" href="../img/icone.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var id_us_temp = parseInt(<?php echo $_GET['id'];?>);
    </script>

</head>
<body>

    <?php

        require_once("menu.php");

    ?>

    <div class="container">

        <div class="box-main box-cad-categoria">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-person-fill"></i> Usuário</li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pencil"></i> Editar Informações</li>
                </ol>
            </nav>

            <div class="row">

                <div class="col-lg-4">

                    <h3>Editar Informações</h3>

                    <div class="row">

                        <div class="form-group">
                            <label for="">Nome do Usuário:</label>
                            <input type="text" class="form-control" id="eNomEdi2" value="<?php echo $_SESSION['user']['nome_tb_usuario']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">CPF do Usuário:</label>
                            <input type="text" class="form-control" id="eCpfEdi2" value="<?php echo $_SESSION['user']['cpf_tb_usuario']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Usuário (único):</label>
                            <input type="text" class="form-control" id="eUsuEdi2" value="<?php echo $_SESSION['user']['usuario_tb_usuario']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Whatsapp do Usuário:</label>
                            <input type="text" class="form-control" id="eWhaEdi2" value="<?php echo $_SESSION['user']['telefone_tb_usuario']; ?>">
                        </div>

                        <input type="hidden" id="ePerEdi2" value="<?php echo $_SESSION['user']['permissao_tb_usuario']; ?>">

                        <div class="form-group">
                            <br>
                            <button type="" class="btn btn-primary" id="btnSalUsuEdi2"><i class="bi bi-check-circle-fill"></i> Salvar Alterações</button>
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