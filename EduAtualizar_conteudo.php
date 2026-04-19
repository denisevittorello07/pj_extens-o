<?php

require_once 'DAO/EducacaoFinanceiraDAO.php';

$dao = new EducacaoFinanceiraDAO();

// Recebendo os dados do formulário
$idConteudo = trim($_POST['idConteudo']);
$titulo     = trim($_POST['titulo']);
$conteudo   = trim($_POST['conteudo']);
$idUsuario  = 1; // depois troque para a variável da sessão

// Chamada ao DAO para atualizar
$ret = $dao->AtualizarEducacaoFinanceira($idEducacao, $titulo, $tipo, $nivel, $descricao, $idConta);

