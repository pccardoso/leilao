<?php

  session_start();

  if(!isset($_SESSION['user'])){
    header("location: ../index.php?msg=1");
  }

  $per = $_SESSION['user']['permissao_tb_usuario'];
  $id_user = $_SESSION['user']['id_tb_usuario'];
  $nome = $_SESSION['user']['nome_tb_usuario'];

?>

<nav class="navbar navbar-expand-lg navbar-light menu-blue">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php if($pag == 'hom'){echo "active";}?>" aria-current="page" href="#"><img width="150px" src="../img/logo.png" alt=""></a>
        </li>
        <?php if(!$per){?>
        <li class="nav-item">
          <a class="nav-link <?php if($pag == 'hom'){echo "active";}?>" aria-current="page" href="index.php"><i class="bi bi-currency-dollar"></i> Leilões</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if($pag == 'hom'){echo "active";}?>" aria-current="page" href="arrematado.php"><i class="bi bi-check-circle-fill"></i> Arrematados</a>
        </li>

        <?php } 
        
        if($per){ ?>
        <li class="nav-item dropdown">
          <a class="nav-link <?php if($pag == 'ser'){echo "active";}?>" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-box2-fill"></i> Produto
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cad_produto.php"><i class="bi bi-plus-circle-fill"></i> Cadastrar Produto</a></li>
            <li><a class="dropdown-item" href="con_produto.php"><i class="bi bi-search"></i> Consultar Produto</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link <?php if($pag == 'ser'){echo "active";}?>" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-arrow-left-right"></i> Categoria
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cad_categoria.php"><i class="bi bi-plus-circle-fill"></i> Cadastrar Categoria</a></li>
            <li><a class="dropdown-item" href="con_categoria.php"><i class="bi bi-search"></i> Consultar Categoria</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link <?php if($pag == 'ser'){echo "active";}?>" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-currency-dollar"></i> Leilão
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cad_leilao.php"><i class="bi bi-plus-circle-fill"></i> Cadastrar Leilão</a></li>
            <li><a class="dropdown-item" href="con_leilao.php"><i class="bi bi-search"></i> Consultar Leilão</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link <?php if($pag == 'ser'){echo "active";}?>" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-check-fill"></i> Usuários
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cad_usuario.php"><i class="bi bi-plus-circle-fill"></i> Cadastrar Usuário</a></li>
            <li><a class="dropdown-item" href="con_usuario.php"><i class="bi bi-search"></i> Consultar Usuário</a></li>
          </ul>
        </li>

        <?php } ?>

        <li class="nav-item dropdown">
          <a class="nav-link <?php if($pag == 'ser'){echo "active";}?>" dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-fill"></i> <?php echo explode(" ", $nome)[0];?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="edit_user.php?id=<?php echo $id_user;?>"><i class="bi bi-pencil-fill"></i> Editar Informações</a></li>
            <li><a class="dropdown-item" href="alt_pass.php?id=<?php echo $id_user;?>"><i class="bi bi-lock-fill"></i> Alterar senha</a></li>
            <li><a class="dropdown-item" href="logoff.php"><i class="bi bi-box-arrow-in-left"></i> Sair</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>