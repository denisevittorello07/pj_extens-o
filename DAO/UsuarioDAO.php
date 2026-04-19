<?php

require_once 'UtilDAO.php';
require_once 'Conexao.php';

class UsuarioDAO extends Conexao{

    public function ValidarLogin($email, $senha)
    {
        if (empty($email) || empty($senha)) {

            return 0;
        } else if (strlen($senha) < 6 || strlen($senha) > 8) {
            return -2;
        } else {
            return 1;
        }
    }

    public function CadastrarUsuario($nome, $email, $senha, $repSenha, $datacadastro)
    {
        if (empty($nome) || empty($email) || empty($senha) || empty($repSenha) || empty($datacadastro)) {

            return 0;
        } else if (strlen($senha) < 6 || strlen($senha) > 8) {
            return -2;
        } else if ($senha != $repSenha) {
            return -3;
        } else {

            $conexao = parent::retornarConexao();

        $comando_sql = 'inset INTO tb_usuario(nome_usuario, email_usuario, senha_usuario, data_cadastro) VALUES (? , ? , ? , ?); ';
                        
        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);
  
  
            $i= 1;
            $sql->bindValue($i++, $nome);
            $sql->bindValue($i++, $email);
            $sql->bindValue($i++, $senha);
            $sql->bindValue($i++, date ('Y-m-d'));

             try{
                $sql->execute();
                return 1;
            }catch (Exception $ex) {
                echo $ex->getMessage();

                return -1;
            }
            
        }
    }

    public function CarregarMeusDados() {

        $conexao = parent::retornarConexao();
        $comando_sql = 'select nome_usuario,
                         email_usuario
                         senha_usuario
                         from tb_usuario
                         where id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);


        $i = 1;
        $sql->bindValue($i++, UtilDAO::UsuarioLogado());

        //Remove os Index dentro do array, permanecendo somente com as colunas do bando de dados
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql-> execute();

        return $sql ->fetchAll();


    }


    public function GravarMeusDados($nome, $email, $senha, $repSenha)
    {

        if (empty($nome) || empty($email) || empty($senha) || empty($repSenha)) {
            return 0;
        } elseif (strlen($senha) < 6 || strlen($senha) > 8) {
            return -2;
        } else if ($senha != $repSenha) {
            return -3;
        } else {

            $conexao = parent::retornarConexao();
        
            $comando_sql = 'UPDATE tb_usuario
                                SET nome_usuario = ? ,
                                    email_usuario = ? 
                                    senha_usuario = ? 
                                WHERE id_usuario = ?';

            $sql = new PDOStatement();  
            $sql = $conexao->prepare($comando_sql);

            $i= 1;
            $sql->bindValue($i++, $nome);
            $sql->bindValue($i++, $email);
            $sql->bindValue($i++, $senha);
            $sql->bindValue($i++, UtilDAO::UsuarioLogado());

            try{
                $sql->execute();
                return 1;
            }catch (Exception $ex) {
                echo $ex->getMessage();

                return -1;
            }
        }
    }
}
