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

    <title>Cadastrar Usuário</title>

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

        <div class="box-main box-form-cad-usu">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-arrow-left-right"></i> Categoria</li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-plus-circle-fill"></i> Cadastrar</li>
                </ol>
            </nav>

            <div class="row">

                <div class="col-lg-6">

                    <h3>Cadastrar Categoria</h3>

                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nome completo:</label>
                                <input type="text" class="form-control" id="eNom">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Nº do CPF:</label>
                                <input type="text" class="form-control" id="eCpf">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Usuário (único):</label>
                                <input type="text" class="form-control" id="eUsu">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Senha:</label>
                                <input type="password" class="form-control" id="eSen">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Telefone:</label>
                                <input type="text" class="form-control" id="eTel">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Selecione o tipo de Usuário:</label>
                                <select name="" id="ePer" class="form-control">
                                    <option value="">-- selecione --</option>
                                    <option value="0">Usuário Comum</option>
                                    <option value="1">Administrador</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <button type="submit" name="btnSalvar" id="btnCadUseAdm" class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Salvar</button>
                            <button type="reset" name="btnLimpar" class="btn btn-primary"><i class="bi bi-eraser-fill"></i> Limpar</button>
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