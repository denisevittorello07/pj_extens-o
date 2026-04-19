<?php

require_once 'DAO/GrupoFinanceiroDAO.php';

$dao = new GrupoFinanceiroDAO();

$id     = trim($_POST['id_grupo']);
$nome   = trim($_POST['nome_grupo']);
$data   = trim($_POST['data_cadastro']);
$desc   = trim($_POST['descricao_grupo']);
$idUser = 1;

$ret = $dao->AtualizarGrupoFinanceiro($idGrupo, $nomeGrupo, $dataCadastro, $descricaoGrupo, $idUsuario);

