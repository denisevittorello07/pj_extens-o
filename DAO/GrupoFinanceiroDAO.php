<?php

require_once 'UtilDAO.php';

class GrupoFinanceiroDAO extends UtilDAO
{

    public function CadastrarGrupoFinanceiro($nomeGrupo, $dataCadastro, $descricaoGrupo, $idUsuario)
    {
        if (
            empty(trim($nomeGrupo)) || empty(trim($dataCadastro)) ||
            empty(trim($descricaoGrupo)) || empty($idUsuario)
        ) {
            return 0; // erro: campos vazios
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("
            INSERT INTO tb_grupo_financeiro
            (nome_grupo, data_cadastro, descricao_grupo, id_usuario)
            VALUES
            (?, ?, ?, ?)
        ");

        $sql->bindValue(1, $nomeGrupo);
        $sql->bindValue(2, $dataCadastro);
        $sql->bindValue(3, $descricaoGrupo);
        $sql->bindValue(4, $idUsuario);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }


    // public function CarregarGruposUsuario()
    // {
    //     $con = parent::retornarConexao();

    //     $cmd_sql = 'SELECT id_grupo, nome_grupo, data_cadastro, descricao_grupo
    //                 FROM tb_grupo_financeiro
    //                 WHERE id_usuario = ?
    //                 ORDER BY nome_grupo ASC';

    //     $sql = new PDOStatement();

    //     $sql = $con->prepare($cmd_sql);

    //     $sql->bindValue(1, UtilDAO::UsuarioLogado());

    //     $sql->fetchAll(PDO::FETCH_ASSOC);

    //     $sql->execute();

    //     return $sql->fetchAll();
    // }

    public function CarregarGrupoPorID($idGrupo)
    {
        if (empty($idGrupo)) {
            return 0;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("
            SELECT id_grupo, nome_grupo, data_cadastro, descricao_grupo
            FROM tb_grupo_financeiro
            WHERE id_grupo = ?
        ");

        $sql->bindValue(1, $idGrupo);

        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AtualizarGrupoFinanceiro($idGrupo, $nomeGrupo, $dataCadastro, $descricaoGrupo, $idUsuario)
    {
        if (
            empty($idGrupo) || empty(trim($nomeGrupo)) || empty(trim($dataCadastro)) ||
            empty(trim($descricaoGrupo)) || empty($idUsuario)
        ) {
            return 0;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("
            UPDATE tb_grupo_financeiro
            SET nome_grupo = ?, 
                data_cadastro = ?, 
                descricao_grupo = ?
            WHERE id_grupo = ? AND id_usuario = ?
        ");

        $sql->bindValue(1, $nomeGrupo);
        $sql->bindValue(2, $dataCadastro);
        $sql->bindValue(3, $descricaoGrupo);
        $sql->bindValue(4, $idGrupo);
        $sql->bindValue(5, $idUsuario);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }


    public function ExcluirGrupoFinanceiro($idGrupo)
    {
        if (empty($idGrupo)) {
            return 0;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("
            DELETE FROM tb_grupo_financeiro
            WHERE id_grupo = ?
        ");

        $sql->bindValue(1, $idGrupo);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }
}
