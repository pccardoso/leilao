<?php

    require_once("../php/Administrador.class.php");
    $adm = new Administrador();
    
    $page = "";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Leilões Arrematados</title>

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
        $categoria = $adm->cat->consultar();

    ?>

    <div class="container box-view-lance">

        <div class="row">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-person-fill"></i> Área de Lance</li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-check-circle-fill"></i> Arrematados</li>
                </ol>
            </nav>

            <div class="col-lg-12">
                <?php if(isset($_GET['msg'])){?>
                    <div class="alert alert-info" role="alert">
                        <strong><i class="bi bi-info-circle-fill"></i> Atenção:</strong> O leilão já está encerrado!
                    </div>
                <?php }?>
            </div>

            <?php
                foreach ($categoria as $key => $c) {

                    $leilao = $adm->lei->consultar("WHERE tb_produto.id_categoria_tb_produto=".$c['id_tb_categoria']);
            ?>

                    <div class="col-lg-12">

                        <h2><?php echo $c['nome_tb_categoria'];?></h2>

                        <div class="row">

                            <?php

                                foreach ($leilao as $key => $l) {

                                    $gan = $adm->lei->verificarGanhador($l['tb_leilao']);

                                    $arq = unserialize($l['anexo_tb_produto']);

                                    if(!isset($gan[0])){
                                        $gan[0]['id_usuario_tb_lance'] = 0;
                                    }

                                    //visualizar apenas os leilões abertos
                                    if(!$l['status_tb_leilao'] && $gan[0]['id_usuario_tb_lance'] == $id_user){
                            ?>

                            <div class="col-lg-3">
                                <div class="card" style="width: auto;">
                                    <img src="../upload/<?php echo $arq[0];?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><i class="bi bi-trophy-fill"></i> <?php echo $l['nome_tb_produto']; ?></h5>
                                        <p class="card-text"><?php echo $l['descricao_tb_produto']; ?></p>
                                        <p class="text-basic-gan">R$ <?php echo number_format($gan[0]['valor_tb_lance'],2, ",", ".");?></p>
                                    </div>
                                </div>
                            </div>

                            <?php
                                    }
                                }
                            ?>
                        </div>

                    </div>

            <?php
                }
            ?>

            

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