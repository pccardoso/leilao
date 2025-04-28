<?php

    require_once("BancoDeDados.class.php");

    class Usuario extends BancoDeDados{

        public function login(array $usuario){

            parent::conectar();

            $result = array();

            $usu = $usuario['eUsu'];
            $pas = $usuario['eSen'];

            parent::result("SELECT * FROM tb_usuario WHERE usuario_tb_usuario='$usu' AND senha_tb_usuario='$pas'");

            if($dados = parent::__get("result")->fetch_assoc()){
                if($dados['status_tb_usuario']){
                    $result = array(2, "Login realizado com sucesso!", $dados);
                }else{
                    $result = array(1, "Usuário $usu bloqueado, favor, verificar!");
                }
            }else{
                $result = array(0, "Usuário $usu não encontrado!");
            }

            parent::desconectar();
            return $result;

        }

        public function cadastrar(array $usuario){

            parent::conectar();

            $nome = $usuario['eNom'];
            $usua = $usuario['eUsu'];
            $senh = $usuario['eSen'];
            $tele = $usuario['eTel'];
            $perm = $usuario["ePer"];
            $cpf = $usuario['eCpf'];

            $result = array(0);

            parent::result("SELECT * FROM tb_usuario WHERE usuario_tb_usuario='$usua'");

            if($dados = parent::__get("result")->fetch_assoc()){
                $result = array(2, "O usuário $usua já existe, favor digitar outro usuário para $nome!");
            }else{

                if(parent::query("INSERT INTO tb_usuario (nome_tb_usuario, usuario_tb_usuario, senha_tb_usuario, permissao_tb_usuario, telefone_tb_usuario, cpf_tb_usuario) VALUES ('$nome', '$usua', '$senh', '$perm', '$tele', '$cpf')")){
                    $result = array(1, "Usuário $usua cadastrado com sucesso!");
                }else{
                    $result = array(0, "Erro ao cadastrar usuário:".parent::__get("mysqli")->error);
                }

            }

            parent::desconectar();
            return $result;

        }

        public function consultar($sql=""){
            parent::conectar();
            $result = array();

            parent::result("SELECT * FROM tb_usuario $sql");

            while($dados = parent::__get("result")->fetch_assoc()){
                $result[] = $dados;
            }

            parent::desconectar();

            return $result;
        }

        public function text_permissao($id){
            switch ($id) {
                case 0: return "Básico"; break;
                case 1: return "Administrador"; break;
            }
        }
        
        public function listarTable1(){

            $result = $this->consultar();

            foreach ($result as $key => $value) {

                $id = $value['id_tb_usuario'];
                $nome = $value['nome_tb_usuario'];
                $usua = $value['usuario_tb_usuario'];
                $tipo = $this->text_permissao($value['permissao_tb_usuario']);
                $cpf = $value['cpf_tb_usuario'];
                $tel = $value['telefone_tb_usuario'];

                $acao = "
                    <button class='btn btn-primary btn-sm' operacao='btnEdi' eIdUsu='".$value['id_tb_usuario']."'><i class='bi bi-pencil'></i></button>
                    <button class='btn btn-danger btn-sm' operacao='btnDel' eIdUsu='".$value['id_tb_usuario']."'><i class='bi bi-trash3-fill'></i></button>
                ";

                echo "  <tr id='row_".$value['id_tb_usuario']."'>
                            <td>$id</td>
                            <td>$cpf</td>
                            <td>$nome</td>
                            <td>$usua</td>
                            <td>$tel</td>
                            <td>$tipo</td>
                            
                            <td>$acao</td>
                        </tr>";
            }

        }

        public function excluir($id){
            parent::conectar();
            $result = array();
            if(parent::query("DELETE FROM tb_usuario WHERE id_tb_usuario=$id")){
                $result = array(1, "Usuário de Nº $id excluido com sucesso!");
            }else{
                $result = array(0, "Erro ao excluir o usuário de Nº $id: ".parent::__get("mysqli")->error);
            }

            parent::desconectar();
            return $result;
        }

        public function atualizar(array $usuario){

            $id = $usuario['eIdUsu'];
            $nome = $usuario['eNomUsuEdi'];
            $cpf = $usuario['eCpfUsuEdi'];
            $usu = $usuario['eUsuUsuEdi'];
            $tel = $usuario['eWhaUsuEdi'];
            $per = $usuario['ePerUsuEdi'];

            $result = array();

            parent::conectar();

            parent::result("SELECT * FROM tb_usuario WHERE tb_usuario.usuario_tb_usuario='$usu'");

            if(parent::query("UPDATE tb_usuario SET nome_tb_usuario='$nome', cpf_tb_usuario='$cpf', usuario_tb_usuario='$usu', telefone_tb_usuario='$tel', permissao_tb_usuario='$per' WHERE tb_usuario.id_tb_usuario=$id")){
                $result = array(1, "Usuário de Nº $id atualizado com sucesso!");
            }else{
                $result = array(0, "Erro ao atualizar usuario: ".parent::__get("mysqli")->error);
            }
            parent::desconectar();
            return $result;

        }

        public function alterar_senha(array $infor){
            $sen = $infor['eSenUsu'];
            $id = $infor['eIdUsu'];

            parent::conectar();

            $result = array();

            try{

                if(parent::query("UPDATE tb_usuario SET senha_tb_usuario='$sen' WHERE tb_usuario.id_tb_usuario=$id")){
                    $result = array(1, "Senha atualizada com sucesso!");
                }else{
                    $result = array(0, "Erro ao atualizar senha!");
                }

            }catch(Exception $sql){
                $result = array(0, "Erro ao registrar: ".$sql->getMessage());
            }

            parent::desconectar();
            return $result;
        }

    }

?>