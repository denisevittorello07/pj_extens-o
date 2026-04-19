<?php

require_once 'UtilDAO.php';

class EducacaoFinanceiraDAO extends UtilDAO
{
    public function CadastrarEducacaoFinanceira($titulo, $tipo, $nivel, $descricao, $idConta, $idUsuario)
    {
        if (empty($titulo) || empty($tipo) || empty($nivel) || empty($descricao) || empty($idConta) || empty($idUsuario)) {
            return 0;
        } else if (!is_numeric($tipo) || $tipo < 0) {
            return -2;
        } else if (!is_numeric($nivel) || $nivel < 0) {
            return -3;
        } else if (!is_numeric($idConta) || $idConta <= 0) {
            return -4;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("INSERT INTO tb_educacao_financeira
                              (titulo_dicas, tipo_educacao, nivel_ensino, descricao_dicas, id_conta, id_usuario)
                              VALUES (?, ?, ?, ?, ?, ?)");

        $sql->bindValue(1, $titulo);
        $sql->bindValue(2, $tipo);
        $sql->bindValue(3, $nivel);
        $sql->bindValue(4, $descricao);
        $sql->bindValue(5, $idConta);
        $sql->bindValue(6, $idUsuario);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }

    public function AtualizarEducacaoFinanceira($idEducacao, $titulo, $tipo, $nivel, $descricao, $idConta)
    {
        if (empty($idEducacao) || empty($titulo) || empty($tipo) || empty($nivel) || empty($descricao) || empty($idConta)) {
            return 0;
        } else if (!is_numeric($idEducacao) || $idEducacao <= 0) {
            return -2;
        } else if (!is_numeric($tipo) || $tipo < 0) {
            return -3;
        } else if (!is_numeric($nivel) || $nivel < 0) {
            return -4;
        } else if (!is_numeric($idConta) || $idConta <= 0) {
            return -5;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("UPDATE tb_educacao_financeira
                              SET titulo_dicas = ?, tipo_educacao = ?, nivel_ensino = ?, descricao_dicas = ?, id_conta = ?
                              WHERE id_educacao = ?");

        $sql->bindValue(1, $titulo);
        $sql->bindValue(2, $tipo);
        $sql->bindValue(3, $nivel);
        $sql->bindValue(4, $descricao);
        $sql->bindValue(5, $idConta);
        $sql->bindValue(6, $idEducacao);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }

    public function ExcluirEducacaoFinanceira($idEducacao)
    {
        if (empty($idEducacao)) {
            return 0;
        } else if (!is_numeric($idEducacao) || $idEducacao <= 0) {
            return -2;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("DELETE FROM tb_educacao_financeira
                              WHERE id_educacao = ?");

        $sql->bindValue(1, $idEducacao);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }

    public function CarregarEducacaoUsuario($idUsuario)
    {
        if (empty($idUsuario)) {
            return 0;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("SELECT id_educacao,
                                     titulo_dicas,
                                     tipo_educacao,
                                     nivel_ensino,
                                     descricao_dicas,
                                     id_conta
                              FROM tb_educacao_financeira
                              WHERE id_usuario = ?
                              ORDER BY id_educacao DESC");

        $sql->bindValue(1, $idUsuario);

        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return -1;
        }
    }
}