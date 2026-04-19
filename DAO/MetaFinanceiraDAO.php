<?php

require_once 'UtilDAO.php';

class MetaFinanceiraDAO extends UtilDAO
{
    public function CadastrarMetaFinanceira($nomeMeta, $valorMeta, $valorAtual, $dataLimite, $descricaoMeta, $idUsuario)
    {
        if (empty($nomeMeta) || empty($valorMeta) || empty($valorAtual) || empty($dataLimite) || empty($descricaoMeta) || empty($idUsuario)) {
            return 0;
        } else if (!is_numeric($valorMeta) || !is_numeric($valorAtual)) {
            return -2;
        } else if ($valorMeta <= 0) {
            return -3;
        } else if ($valorAtual < 0) {
            return -4;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("INSERT INTO tb_meta_financeira
                             (nome_meta, valor_meta, valor_atual, data_limite, descricao_meta, id_usuario)
                             VALUES (?, ?, ?, ?, ?, ?)");

        $sql->bindValue(1, $nomeMeta);
        $sql->bindValue(2, $valorMeta);
        $sql->bindValue(3, $valorAtual);
        $sql->bindValue(4, $dataLimite);
        $sql->bindValue(5, $descricaoMeta);
        $sql->bindValue(6, $idUsuario);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }

    public function AtualizarValorAtual($idMeta, $novoValor)
    {
        if (empty($idMeta) || empty($novoValor)) {
            return 0;
        } else if (!is_numeric($novoValor) || $novoValor < 0) {
            return -2;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("UPDATE tb_meta_financeira
                              SET valor_atual = ?
                              WHERE id_meta = ?");

        $sql->bindValue(1, $novoValor);
        $sql->bindValue(2, $idMeta);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }

    public function ConsultarMetaFinanceira($valorMeta, $valorAtual)
    {
        if ($valorAtual >= $valorMeta) {
            return 0;
        } else {
            return 1;
        }
    }

    public function ExcluirMetaFinanceira($idMeta)
    {
        if (empty($idMeta)) {
            return 0;
        } else if (!is_numeric($idMeta) || $idMeta <= 0) {
            return -2;
        }

        $con = parent::retornarConexao();

        $sql = $con->prepare("DELETE FROM tb_meta_financeira
                              WHERE id_meta = ?");

        $sql->bindValue(1, $idMeta);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }
public function CarregarMinhasMetas($idUsuario)
{
    if (empty($idUsuario)) {
        return []; // Sempre retorna array
    }

    $con = parent::retornarConexao();

    $sql = $con->prepare("SELECT id_meta,
                                 nome_meta,
                                 valor_meta,
                                 valor_atual,
                                 data_limite,
                                 descricao_meta
                          FROM tb_meta_financeira
                          WHERE tb_usuario = ?
                          ORDER BY id_meta DESC");

    $sql->bindValue(1, $idUsuario);

    try {
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return is_array($result) ? $result : [];
    } catch (Exception $e) {
        return []; // Retorna array vazio em caso de erro
    }
}
}