<?php

require_once 'UtilDAO.php';

class ContaBancariaDAO extends UtilDAO
{
    // ================================================================
    // CADASTRAR CONTA BANCÁRIA
    // ================================================================
    public function CadastrarConta($nomeBanco, $numAgencia, $numConta, $saldoConta, $idUsuario)
    {
        if (empty(trim($nomeBanco)) || empty(trim($numAgencia)) || empty(trim($numConta)) ||
            $saldoConta === '' || !is_numeric($saldoConta) || empty($idUsuario)) {
            return 0; // Erro: campos inválidos
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("
            INSERT INTO tb_conta_bancaria
            (nome_banco, num_agencia, num_conta, saldo_conta, tb_usuario)
            VALUES (?, ?, ?, ?, ?)
        ");

        $sql->bindValue(1, $nomeBanco);
        $sql->bindValue(2, $numAgencia);
        $sql->bindValue(3, $numConta);
        $sql->bindValue(4, $saldoConta);
        $sql->bindValue(5, $idUsuario);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1; 
        }
    }

    // ================================================================
    // CONSULTAR TODAS AS CONTAS DO USUÁRIO
    // ================================================================
    public function CarregarContasUsuario($idUsuario)
    {
        if (empty($idUsuario)) {
            return 0;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("
            SELECT id_conta, nome_banco, num_agencia, num_conta, saldo_conta
            FROM tb_conta_bancaria
            WHERE tb_usuario = ?
            ORDER BY nome_banco ASC
        ");

        $sql->bindValue(1, $idUsuario);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // ================================================================
    // CONSULTAR UMA CONTA ESPECÍFICA (PARA EDIÇÃO)
    // ================================================================
    public function CarregarContaPorID($idConta)
    {
        if (empty($idConta)) {
            return 0;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("
            SELECT id_conta, nome_banco, num_agencia, num_conta, saldo_conta
            FROM tb_conta_bancaria
            WHERE id_conta = ?
        ");

        $sql->bindValue(1, $idConta);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // ================================================================
    // ATUALIZAR CONTA
    // ================================================================
    public function AtualizarConta($idConta, $nome_banco, $numAgencia, $numConta, $saldoConta, $idUsuario)
    {
        if (empty($idConta) || empty(trim($nome_banco)) || empty(trim($numAgencia)) ||
            empty(trim($numConta)) || $saldoConta === '' || !is_numeric($saldoConta) ||
            empty($idUsuario)) {
            return 0;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("
            UPDATE tb_conta_bancaria
            SET nome_banco = ?, 
                num_agencia = ?, 
                num_conta = ?, 
                saldo_conta = ?
            WHERE id_conta = ? AND tb_usuario = ?
        ");

        $sql->bindValue(1, $nome_banco);
        $sql->bindValue(2, $numAgencia);
        $sql->bindValue(3, $numConta);
        $sql->bindValue(4, $saldoConta);
        $sql->bindValue(5, $idConta);
        $sql->bindValue(6, $idUsuario);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }

    // ================================================================
    // EXCLUIR CONTA
    // ================================================================
    public function ExcluirConta($idConta)
    {
        if (empty($idConta)) {
            return 0;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("DELETE FROM tb_conta_bancaria WHERE id_conta = ?");
        $sql->bindValue(1, $idConta);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }
}
