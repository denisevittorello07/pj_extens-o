<?php

require_once 'DAO/MetaFinanceiraDAO.php';

$dao = new MetaFinanceiraDAO();

$id = $_GET['cod'];
$idUser = 1;

$ret = $dao->ExcluirMetaFinanceira($idMeta);

?>

