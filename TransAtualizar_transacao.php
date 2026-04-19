<?php
// atualizar_transacao.php
require_once 'DAO/TransacaoFinanceiraDAO.php';
require_once 'UtilDAO.php';

UtilDAO::UsuarioLogado();
$idUsuario = UtilDAO::UsuarioLogado();

$idTransacao = isset($_POST['idTransacao']) ? trim($_POST['idTransacao']) : null;
$tipo        = isset($_POST['tipo']) ? trim($_POST['tipo']) : null;
$data        = isset($_POST['data']) ? trim($_POST['data']) : null;
$valor       = isset($_POST['valor']) ? trim($_POST['valor']) : null;
$obs         = isset($_POST['obs']) ? trim($_POST['obs']) : null;
$idGrupo     = isset($_POST['idGrupo']) && $_POST['idGrupo'] !== '' ? trim($_POST['idGrupo']) : null;
$idMeta      = isset($_POST['idMeta']) && $_POST['idMeta'] !== '' ? trim($_POST['idMeta']) : null;
$idConta     = isset($_POST['idConta']) ? trim($_POST['idConta']) : null;

$dao = new TransacaoFinanceiraDAO();
$ret = $dao->AtualizarTransacaoFinanceira($idTransacao, $tipo, $data, $valor, $obs, $idGrupo, $idMeta, $idConta, $idUsuario);

?>
