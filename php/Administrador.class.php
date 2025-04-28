<?php

    require_once("Produto.class.php");
    require_once("Categoria.class.php");
    require_once("Leilao.class.php");
    require_once("Usuario.class.php");

    class Administrador{

        public $pro;
        public $cat;
        public $lei;
        public $usu;

        public function __construct(){
            $this->pro = new Produto();
            $this->cat = new Categoria();
            $this->lei = new Leilao();
            $this->usu = new Usuario();
            date_default_timezone_set("America/Fortaleza");
        }

    }

?>