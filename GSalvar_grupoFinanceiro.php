<?php

require_once 'DAO/GrupoFinanceiroDAO.php';

$dao = new GrupoFinanceiroDAO();

$nome   = trim($_POST['nome_grupo']);
$data   = trim($_POST['data_cadastro']);
$desc   = trim($_POST['descricao_grupo']);
$idUser = 1; // depois substituir pela sessão

$ret = $dao->CadastrarGrupoFinanceiro($nome, $data, $desc, $idUser);

?>