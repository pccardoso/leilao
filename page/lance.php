<?php

    require_once("../php/Administrador.class.php");
    $adm = new Administrador();

    $page = "";

    session_start();

    if(!isset($_SESSION['user'])){
        header("location: ../index.php?msg=1");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Área de Lances</title>

    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../lib/date/css/bootstrap-datepicker.css">
    <link rel="shortcut icon" href="../img/icone.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        <?php
            $dados = array();

            if(isset($_GET['id'])){
                $dados = $adm->lei->consultar("WHERE tb_leilao.tb_leilao=".$_GET['id']);
            }

            if(!$dados[0]['status_tb_leilao']){
                header('location: index.php?msg=1');
            }

            $anexos = unserialize($dados[0]['anexo_tb_produto']);
        ?>

        var lance_min = <?php echo $dados[0]['valor_min_tb_leilao'];?>;
        var id_usuario = <?php echo $_SESSION['user']['id_tb_usuario'];?>;
        var valor_tb_leilao = parseFloat(<?php echo $dados[0]['valor_tb_leilao'];?>);
    </script>

</head>
<body>

    <div class="box-view" style="display:none">
        <div class="row">
            <div class="col-lg-12">
                <img width="55%" id="img-tag" src="..." class="rounded mx-auto d-block" alt="...">
                <button class="btn btn-danger" id="btnFecVis"><i class="bi bi-x-lg"></i> Fechar</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-6 offset-md-3">

                <div id="carouselExample" class="carousel slide carousel-model">
                        <div class="carousel-inner">

                            <?php
                                foreach ($anexos as $key => $value) {
                                    $active = "";
                                    if(!$key){
                                        $active = "active";
                                    }

                            ?>

                                <div class="carousel-item <?php echo $active?>">
                                    <img src="../upload/<?php echo $value;?>" class="d-block w-100" alt="...">
                                </div>

                            <?php

                                }
                            ?>

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>

                <div class="box-login box-lance">

                    

                    <h1 style="text-align:center"><i class="bi bi-trophy"></i> <?php echo $dados[0]['nome_tb_produto'];?></h1>
                    <label for=""><strong><i class="bi bi-key-fill"></i> Cód. Leilão:</strong> <span id="spanIdLei"><?php echo $dados[0]['tb_leilao'];?></span></label> 
                    <label for=""><strong><i class="bi bi-dot"></i> Situação: </strong><span id='spanStaLei'><?php echo $adm->lei->text_status($dados[0]['status_tb_leilao']); ?></span></label><br>
                    <label for=""><strong><i class="bi bi-currency-dollar"></i> Valor de lance mínimo: R$ </strong> <?php echo $dados[0]['valor_min_tb_leilao'];?><?php  ?></label><br>
                    <label for=""><strong><i class="bi bi-chat-right-text"></i> Descrição do Produto:</strong> <?php echo $dados[0]['descricao_tb_produto']; ?></label>
                
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 id="valorLance">R$ <?php echo $dados[0]['valor_tb_leilao'];?></h2>
                        </div>

                        <div class="col-lg-12">
                            <div class="box-history-lance">
                                
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="input-group mb-2">
                                <button class="btn btn-danger btn-lg" type="button" id="btnMenos"><i class="bi bi-arrow-down-circle-fill"></i></button>
                                <input type="text" id="eValLan" value="0" class="form-control form-lg" placeholder="R$" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-danger btn-lg" type="button" id="btnMais"><i class="bi bi-arrow-up-circle-fill"></i></button>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-lg btn-bolder" type="button" id="btnCadLan" style="width:100%"><i class="bi bi-star"></i> Enviar</button>
                            </div>
                        </div>

                        <div class="col-lg-12" style="text-align:center">
                            <br>
                            <a href="index.php" class="btn btn-success btn-lg btn-bolder"><i class="bi bi-arrow-left-circle-fill"></i> Voltar</a>
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
    <script src="../lib/jquery-masked/dist/jquery.mask.js"></script>
    <script src="../js/script.js"></script>
    <script>

        var type = 0;

        $('#eValLan').mask('#0.00', {reverse: true});

        setInterval(functionAtualizarLance, 2000);

    </script>
</body>
</html>