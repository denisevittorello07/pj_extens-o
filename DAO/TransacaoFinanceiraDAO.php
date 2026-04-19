<?php

require_once 'UtilDAO.php';

class TransacaoFinanceiraDAO extends UtilDAO
{
    public function CadastrarTransacaoFinanceira($tipo, $data, $valor, $obs, $idGrupo, $idMeta, $idConta, $idUsuario)
    {
        if (empty($tipo) || empty($data) || empty($valor) || empty($idConta) || empty($idUsuario)) {
            return 0;
        } else if (!is_numeric($tipo) || $tipo < 0) {
            return -2;
        } else if (!is_numeric($valor) || $valor <= 0) {
            return -3;
        } else if (!is_numeric($idConta) || $idConta <= 0) {
            return -4;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("INSERT INTO tb_transacao_financeira
                              (tipo_transacao, data_transacao, valor_transacao, obs_transacao,
                               id_grupo, id_meta, id_conta, id_usuario)
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $sql->bindValue(1, $tipo);
        $sql->bindValue(2, $data);
        $sql->bindValue(3, $valor);
        $sql->bindValue(4, $obs);
        $sql->bindValue(5, $idGrupo);
        $sql->bindValue(6, $idMeta);
        $sql->bindValue(7, $idConta);
        $sql->bindValue(8, $idUsuario);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }

    public function AtualizarTransacaoFinanceira($idTransacao, $tipo, $data, $valor, $obs, $idGrupo, $idMeta, $idConta)
    {
        if (empty($idTransacao) || empty($tipo) || empty($data) || empty($valor) || empty($idConta)) {
            return 0;
        } else if (!is_numeric($idTransacao) || $idTransacao <= 0) {
            return -2;
        } else if (!is_numeric($tipo) || $tipo < 0) {
            return -3;
        } else if (!is_numeric($valor) || $valor <= 0) {
            return -4;
        } else if (!is_numeric($idConta) || $idConta <= 0) {
            return -5;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("UPDATE tb_transacao_financeira
                              SET tipo_transacao = ?, data_transacao = ?, valor_transacao = ?, obs_transacao = ?,
                                  id_grupo = ?, id_meta = ?, id_conta = ?
                              WHERE id_transacao = ?");

        $sql->bindValue(1, $tipo);
        $sql->bindValue(2, $data);
        $sql->bindValue(3, $valor);
        $sql->bindValue(4, $obs);
        $sql->bindValue(5, $idGrupo);
        $sql->bindValue(6, $idMeta);
        $sql->bindValue(7, $idConta);
        $sql->bindValue(8, $idTransacao);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }


    public function ExcluirTransacaoFinanceira($idTransacao)
    {
        if (empty($idTransacao)) {
            return 0;
        } else if (!is_numeric($idTransacao) || $idTransacao <= 0) {
            return -2;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("DELETE FROM tb_transacao_financeira
                              WHERE id_transacao = ?");

        $sql->bindValue(1, $idTransacao);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }


    public function CarregarTransacoesUsuario($idUsuario)
    {
        if (empty($idUsuario)) {
            return 0;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("SELECT id_transacao,
                                     tipo_transacao,
                                     data_transacao,
                                     valor_transacao,
                                     obs_transacao,
                                     id_grupo,
                                     id_meta,
                                     id_conta
                              FROM tb_transacao_financeira
                              WHERE id_usuario = ?
                              ORDER BY data_transacao DESC");

        $sql->bindValue(1, $idUsuario);

        try {
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return -1;
        }
    }
}
