<?php

    require_once("BancoDeDados.class.php");
    
    class Categoria extends BancoDeDados{

        public function cadastrar(array $categoria){
            parent::conectar();

            $nome = $categoria['eNom'];
            $desc = $categoria['eDes'];

            $result = array();

            if(parent::query("INSERT INTO tb_categoria (nome_tb_categoria, descricao_tb_categoria) VALUES ('$nome', '$desc')")){
                $result = array(1, "Categoria $nome registrada com sucesso!");
            }else{
                $result = array(0,"Erro ao registrar a categoria $nome: ".parent::__get("mysqli")->error);
            }

            parent::desconectar();
            return $result;
        }

        public function consultar($sql=""){

            parent::conectar();

            parent::result("SELECT * FROM tb_categoria $sql");

            $result = array();

            while($dados = parent::__get("result")->fetch_assoc()){
                $result[] = $dados;
            }

            parent::desconectar();

            return $result;
        }

        public function listarSelect(){
            $result = $this->consultar("WHERE tb_categoria.status_tb_categoria='1'");

            foreach ($result as $key => $value) {
                echo "<option value='".$value['id_tb_categoria']."'>".$value['nome_tb_categoria']."</option>";
            }
        }

        public function listarTable1(){
            $result = $this->consultar("");

            foreach ($result as $key => $value) {

                $id = $value['id_tb_categoria'];
                $nome = $value['nome_tb_categoria'];
                $desc = $value['descricao_tb_categoria'];

                $ac = "
                    <button operacao='btnEdi' eIdCat='".$value['id_tb_categoria']."' class='btn btn-primary btn-sm'><i class='bi bi-pencil'></i></button>
                    <button operacao='btnDel' eIdCat='".$value['id_tb_categoria']."' class='btn btn-danger btn-sm'><i class='bi bi-trash3-fill'></i></button>
                ";

                echo "  <tr id='row_".$value['id_tb_categoria']."'>
                            <td>$id</td>
                            <td>$nome</td>
                            <td>$desc</td>
                            <td>$ac</td>
                        <tr>";
            }
        }

        public function excluir($id){

            parent::conectar();

            $result = array();

            if(parent::query("DELETE FROM tb_categoria WHERE id_tb_categoria=$id")){
                $result = array(1, "Categoria de Nº $id removida com sucesso!");
            }else{
                $result = array(0, "Erro ao remover a categoria de Nº $id: ".parent::__get("mysqli")->error);
            }

            parent::desconectar();

            return $result;

        }

        public function atualizar (array $categoria){
            $id = $categoria['eIdCat'];
            $nome = $categoria['eNomCatEdi'];
            $desc = $categoria['eDesCatEdi'];

            $result = array();

            parent::conectar();

            if(parent::query("UPDATE tb_categoria SET nome_tb_categoria='$nome', descricao_tb_categoria='$desc' WHERE tb_categoria.id_tb_categoria=$id")){
                $result = array(1, "Categoria de Nº $id atualizado com sucesso!");
            }else{
                $result = array(0, "Erro ao atualizar categoria: ".parent::__get("mysqli")->error);
            }

            parent::desconectar();
            return $result;
        }

    }
?>