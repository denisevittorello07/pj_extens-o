<?php

require_once 'DAO/MetaFinanceiraDAO.php';

$dao = new MetaFinanceiraDAO();

$nome     = trim($_POST['nome_meta']);
$valor    = trim($_POST['valor_meta']);
$atual    = trim($_POST['valor_atual']);
$data     = trim($_POST['data_limite']);
$desc     = trim($_POST['descricao_meta']);
$idUser   = 1; // depois usar sessão

$ret = $dao->CadastrarMetaFinanceira($nome, $valor, $atual, $data, $desc, $idUser);

?>