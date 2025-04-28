<?php

    require_once("BancoDeDados.class.php");
    
    class Produto extends BancoDeDados{

        public function cadastrar(array $produto): array{
            parent::conectar();

            $result = array();

            $nome = $produto['eNom'];
            $desc = $produto['eDes'];
            $valo = $produto['eValMin'];
            $id_c = $produto['eCat'];

            $temp = false;
            $anexos = array();

            foreach ($_FILES['eAne']['error'] as $key => $erro) {
                if($erro == UPLOAD_ERR_OK){

                    $uploaddir = '../upload/';

                    $nome_arq = date("dmY_His$key").".".explode("/", $_FILES['eAne']['type'][$key])[1];
                    $anexos[] = $nome_arq;

                    $uploadfile = $uploaddir.$nome_arq;

                    if (move_uploaded_file($_FILES['eAne']['tmp_name'][$key], $uploadfile)) {
                        
                        $temp = true;

                    } else {

                        $temp = false;

                    }

                }
            }

            if($temp){

                if(parent::query("INSERT INTO tb_produto (nome_tb_produto, descricao_tb_produto, valor_min_tb_produto, anexo_tb_produto, id_categoria_tb_produto) VALUES ('$nome', '$desc', $valo, '".serialize($anexos)."', $id_c)")){
                    $result = array(1, "Produto cadastrado com sucesso!");
                }else{
                    $result = array(0, "Erro ao cadastrar produto:".parent::__get("mysqli")->error);
                }

            }

            parent::desconectar();
            return $result;
        }

        public function consultar($sql=""){
            parent::conectar();
            $result = array();

            parent::result("SELECT * FROM tb_produto $sql");

            while ($dados = parent::__get("result")->fetch_assoc()) {
                $result[] = $dados;
            }

            parent::desconectar();
            return $result;
        }

        public function listarTable1(){
            $result = $this->consultar();
            foreach ($result as $key => $value) {
                $id = $value['id_tb_produto'];
                $nome = $value['nome_tb_produto'];
                $valo = number_format($value['valor_min_tb_produto'], 2,",", ".");

                $temp = "
                    <button operacao='btnEdi' class='btn btn-primary btn-sm' idPro='".$value['id_tb_produto']."'><i class='bi bi-pencil'></i></button>
                    <button operacao='btnDel' class='btn btn-danger btn-sm' idPro='".$value['id_tb_produto']."'><i class='bi bi-trash3-fill'></i></button>
                ";

                echo "  <tr id='row_".$value['id_tb_produto']."'>
                            <td>$id</td>
                            <td>$nome</td>
                            <td>R$ $valo</td>
                            <td>$temp</td>
                        </tr>";

            }
        }

        public function excluir($id){
            parent::conectar();
            $result = array();
            if(parent::query("DELETE FROM tb_produto WHERE id_tb_produto=$id")){
                $result = array(1, "Produto de Nº $id excluido com sucesso!");
            }else{
                $result = array(0, "Erro ao excluir o produto de Nº $id: ".parent::__get("mysqli")->error);
            }

            parent::desconectar();
            return $result;
        }
        
        public function atualizar(array $produto){
            $id = $produto["eIdPro"];
            $nome = $produto["eNomProEdi"];
            $desc = $produto["eDesProEdi"];
            $valo = $produto["eValProEdi"];

            parent::conectar();
            $result = array();
            if(parent::query("UPDATE tb_produto SET nome_tb_produto='$nome', descricao_tb_produto='$desc', valor_min_tb_produto=$valo WHERE tb_produto.id_tb_produto=$id")){
                $result = array(1, "Produto de Nº $id atualizado com sucesso!");
            }else{
                $result = array(0, "Erro ao atualizar produto: ".parent::__get("result")->error);
            }

            parent::desconectar();
            return $result;

        }

    }

?>