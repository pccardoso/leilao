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

    <title>Cadastrar Produto</title>

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
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-box2-fill"></i> Produto</li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-plus-circle-fill"></i> Cadastrar</li>
                </ol>
            </nav>

            <div class="row">

                <div class="col-lg-6">

                    <form method="post" action="" enctype="multipart/form-data">

                        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />

                        <h3>Cadastrar Produto</h3>

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Nome do Produto:</label>
                                    <input type="text" class="form-control" id="eNom" name="eNom" required>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Descrição do Produto:</label>
                                    <textarea name="eDes" id="eDes" class="form-control" required></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Categoria do Produto:</label>
                                    <select name="eCat" id="eCat" class="form-control">
                                        <?php
                                            $adm->cat->listarSelect();
                                        ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Valor do Produto (R$):</label>
                                    <input type="text" name="eValMin" id="eValMin" class="form-control" required>
                                </div> 
                            </div>

                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label for="">Selecionar o(s) Anexo(s):</label>
                                    <input type="file" name="eAne[]" class="form-control" multiple="multiple" required>
                                </di>

                            </div>

                            <div class="col-lg-12">

                                <br>

                                    <?php 

                                        if (isset($_POST["btnSalvar"])) {
                                            
                                            $result = $adm->pro->cadastrar(array(
                                                "eNom"=> $_POST["eNom"],
                                                "eDes"=> $_POST["eDes"],
                                                "eCat"=> $_POST["eCat"],
                                                "eValMin"=> $_POST["eValMin"]
                                            ));

                                            if($result[0]){ ?>

                                                <div class="alert alert-success" role="alert">
                                                    <?php echo $result[1]; ?>
                                                </div>

                                            <?php

                                            }else{ ?>

                                                <div class="alert alert-danger" role="alert">
                                                    <?php echo $result[1]; ?>
                                                </div>

                                            <?php

                                            }

                                        }

                                    ?>

                                <br>

                                <button type="submit" name="btnSalvar" class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Salvar</button>
                                <button type="reset" name="btnLimpar" class="btn btn-primary"><i class="bi bi-eraser-fill"></i> Limpar</button>
                            </div>

                        </div>

                    
                        </div>

                    </form>

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