<?php
require_once 'DAO/ContaBancariaDAO.php';
require_once 'UtilDAO.php';

UtilDAO::UsuarioLogado();

if (
    !isset($_POST['nomeBanco']) ||
    !isset($_POST['numAgencia']) ||
    !isset($_POST['numConta']) ||
    !isset($_POST['saldoConta']) ||
    !isset($_POST['idConta'])
) {
    header('location: CConsultar_contaBancaria.php?ret=0');
    exit;
}

$nomeBanco   = trim($_POST['nomeBanco']);
$numAgencia  = trim($_POST['numAgencia']);
$numConta    = trim($_POST['numConta']);
$saldoConta  = trim($_POST['saldoConta']);
$idConta     = $_POST['idConta'];

$dao = new ContaBancariaDAO();

$ret = $dao->AtualizarConta(
    $idConta,
    $nomeBanco,
    $numAgencia,
    $numConta,
    $saldoConta,
    UtilDAO::UsuarioLogado()
);

?>
