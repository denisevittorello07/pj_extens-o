<?php
// excluir_transacao.php
require_once 'DAO/TransacaoFinanceiraDAO.php';
require_once 'UtilDAO.php';

UtilDAO::UsuarioLogado();
$idUsuario = UtilDAO::UsuarioLogado();

if (!isset($_GET['cod']) || empty($_GET['cod'])) {
    echo "<script>alert('Transação inválida!'); window.location='TransConsultar_transacao.php';</script>";
    exit;
}

$idTransacao = $_GET['cod'];

$dao = new TransacaoFinanceiraDAO();
$ret = $dao->ExcluirTransacaoFinanceira($idTransacao, $idUsuario);

?>