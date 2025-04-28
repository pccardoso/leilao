<?php

    require_once("BancoDeDados.class.php");

    class Leilao extends BancoDeDados{

        public function cadastrar(array $leilao){
            date_default_timezone_set("America/Fortaleza");
            parent::conectar();

            $result = array();

            $stat = $leilao["cSta"];
            $valinici = $leilao['eValIni'];
            $vallance = $leilao['eValLan'];
            $idpr = $leilao['eIdPro'];

            if(parent::query("INSERT INTO tb_leilao (status_tb_leilao, valor_tb_leilao, data_hora_cadastro_tb_leilao, valor_min_tb_leilao, id_produto_tb_leilao) VALUES ('$stat', $valinici, '".date('Y-m-d H:i:s')."', $vallance, $idpr)")){
                $result = array(1, "Leilão registrado com sucesso!");
            }else{
                $result = array(0, "Erro ao registrar leilão: ".parent::__get("mysqli")->error);
            }

            parent::desconectar();
            return $result;
        }

        public function text_status($id){
            if($id){
                return "Aberto";
            }else{
                return "Fechado";
            }
        }

        public function consultar($sql=""){
            parent::conectar();

            $result = array();

            parent::result("SELECT * FROM tb_leilao INNER JOIN tb_produto ON tb_leilao.id_produto_tb_leilao=tb_produto.id_tb_produto $sql");

            while ($dados = parent::__get("result")->fetch_assoc()) {
                $result[] = $dados;
            }

            parent::desconectar();
            return $result;
        }
        public function consultarLance($id_leilao){

            $result = array();

            parent::conectar();

            parent::result("SELECT * FROM tb_lance INNER JOIN tb_usuario ON tb_usuario.id_tb_usuario=tb_lance.id_usuario_tb_lance INNER JOIN tb_leilao ON tb_lance.id_leilao_tb_lance=tb_leilao.tb_leilao WHERE tb_lance.id_leilao_tb_lance=$id_leilao ORDER BY tb_lance.id_tb_lance DESC");

            while ($dados = parent::__get("result")->fetch_assoc()) {
                $result[] = $dados;
            }

            parent::desconectar();
            return $result;

        }

        public function verificarGanhador($id_leilao){
            $result = array();

            parent::conectar();

            parent::result("SELECT * FROM tb_lance INNER JOIN tb_usuario ON tb_lance.id_usuario_tb_lance=tb_usuario.id_tb_usuario WHERE id_leilao_tb_lance=$id_leilao ORDER BY id_tb_lance DESC");

            while($dados = parent::__get("result")->fetch_assoc()){
                $result[] = $dados;
                break;
            }

            parent::desconectar();
            return $result;
        }

        public function cadastrarLance(array $lance){

            date_default_timezone_set("America/Fortaleza");
            
            $result = array();

            $ganhador = $this->verificarGanhador($lance['eIdLei']);

            parent::conectar();

            $dat = date('Y-m-d H:i:s');
            $id = $lance['eIdLei'];
            $idusu = $lance['eIdUsu'];
            $val = $lance['eValLan'];

            //caso não haja ganhador
            if(!isset($ganhador[0])){
                $ganhador[0]['valor_tb_lance'] = 0;
            }
            
            if($val > $ganhador[0]['valor_tb_lance']){

                if(parent::query("INSERT INTO tb_lance (id_leilao_tb_lance, id_usuario_tb_lance, valor_tb_lance, data_hora_cadastro_tb_lance) VALUE ($id, $idusu, $val, '$dat')")){

                    //$newval = $leilao[0]['valor_tb_leilao'] + $val;

                    if(parent::query("UPDATE tb_leilao SET valor_tb_leilao=$val WHERE tb_leilao.tb_leilao=$id")){
                        $result = array(1, "Lance registrado com sucesso!", $val);
                    }

                    
                }else{
                    $result = array(0, "Erro ao registrar o lance informado:".parent::__get("mysqli")->error);
                }
            }else{
                $result = array(2, "Identificamos um lance maior que o seu, seu lance não foi registrado!");
            }

            parent::desconectar();
            return $result;
        }

        public function listarTable01(){
            $result = $this->consultar();

            foreach ($result as $key => $value) {

                $ganhador = $this->verificarGanhador($value['tb_leilao']);

                if(isset($ganhador[0])){
                    $ganhador = "<a href='#' id_user='".$ganhador[0]['id_tb_usuario']."'>".$ganhador[0]['nome_tb_usuario']."</a>";
                }else{
                    $ganhador = "Sem ganhador";
                }

                $action = "
                    <a href='vis_lance.php?id=".$value['tb_leilao']."' class='btn btn-primary btn-sm' title='Visualizar lances?'><i class='bi bi-eye-fill'></i></a>
                    <button operacao='btnDel' class='btn btn-danger btn-sm' idLei='".$value["tb_leilao"]."'><i class='bi bi-trash3-fill'></i></button>
                    <button operacao='btnEdi' class='btn btn-primary btn-sm' idLei='".$value['tb_leilao']."'><i class='bi bi-pencil'></i></button>
                ";

                $valor = number_format($value['valor_tb_leilao'], 2, ",", ".");

                echo "  <tr id='row_".$value['tb_leilao']."'>
                            <td>".$value['tb_leilao']."</td>
                            <td>".$this->text_status($value['status_tb_leilao'])."</td>
                            <td>R$ ".$valor."</td>
                            <td>$ganhador</td>
                            <td>".$value['id_tb_produto']."</td>
                            <td>".$value['nome_tb_produto']."</td>
                            <td>$action</td>
                        </tr>";
            }
        }

        public function encerrarLeilao(array $leilao){

            parent::conectar();

            $result = array();

            $sta = $leilao['staLei'];
            $id = $leilao['eIdLei'];

            if(parent::query("UPDATE tb_leilao SET status_tb_leilao='$sta' WHERE tb_leilao.tb_leilao=$id")){
                $result = array(1, "Leilão encerrado com sucesso!", $sta);
            }else{
                $result = array(0, "Erro ao encerrar o leilão: ".parent::__get("mysqli")->error);
            }

            parent::desconectar();

            return $result;

        }

        public function excluir($id){
            parent::conectar();
            $result = array(0);
            if(parent::query("DELETE FROM tb_leilao WHERE tb_leilao.tb_leilao=$id")){
                $result = array(1, "Leilão de Nº $id removido com sucesso!");
            }else{
                $result = array(0, "Erro ao remover leilão de Nº $id: ".parent::__get("mysqli")->error);
            }

            parent::desconectar();
            return $result;
        }

        public function atualizar(array $leilao){

            parent::conectar();

            $id = $leilao['eIdLei'];
            $valmin = $leilao['eValLanEdi'];
            $status = $leilao['sStaLeiEdi'];

            if(parent::query("UPDATE tb_leilao SET valor_min_tb_leilao=$valmin, status_tb_leilao='$status' WHERE tb_leilao.tb_leilao=$id")){
                $result = array(1, "Leilão de Nº $id atualizado com sucesso!");
            }else{
                $result = array(0, "Erro ao atualizar: ".parent::__get("mysqli")->error);
            }

            parent::desconectar();

            return $result;

        }

    }

?>