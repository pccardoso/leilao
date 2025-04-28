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

    <title>Visualizar Lance</title>

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

        $dados = array();

        if(isset($_GET['id'])){
            $dados = $adm->lei->consultar("WHERE tb_leilao.tb_leilao=".$_GET['id']);
        }

    ?>

    <div class="container">

        <div class="box-main box-cad-categoria">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-currency-dollar"></i> Leilão</li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-eye-fill"></i> Visualizar Lances</li>
                </ol>
            </nav>

            <div class="row">

                <div class="col-lg-12">

                    <h3>Visualizar Lance</h3>

                    <label for=""><strong>Código do Leilão:</strong> <span id="spanIdLei"><?php echo $_GET['id'];?></span> <strong>Status: </strong><span id="spanStaLei"><?php echo $adm->lei->text_status($dados[0]['status_tb_leilao']); ?></span></label>

                    <div class="col-lg-12">
                        <h2><span id="valorLance"">R$ 0.00</span> <i class="bi bi-trophy"></i> <span id="nomeGan">Sem Lances</span></h2>
                    </div>

                    <div class="col-lg-12">
                        <div class="box-history-lance">
                            
                        </div>
                        <label for=""><i class="bi bi-arrow-repeat"></i> Atualização automática.</label>
                    </div>

                    <br>

                    <div class="col-lg-12">
                        <a href="con_leilao.php" class="btn btn-primary"><i class="bi bi-arrow-left-circle-fill"></i> Voltar</a>
                        <div class="form-check form-switch">
                            <br>
                            <input class="form-check-input" type="checkbox" role="switch" id="cStaEdi" <?php if($dados[0]['status_tb_leilao']){echo "checked";}?>>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Aceitar lances</label>
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

        var type = 1;

        setInterval(functionAtualizarLance, 2000);

    </script>
</body>
</html>