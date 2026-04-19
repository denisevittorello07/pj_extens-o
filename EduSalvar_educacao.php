<?php

require_once 'DAO/EducacaoFinanceiraDAO.php';

$dao = new EducacaoFinanceiraDAO();

// Recebe os dados do formulário
$titulo = trim($_POST['titulo']);
$conteudo = trim($_POST['conteudo']);
$idUsuario = 1; // Exemplo — depois você coloca a sessão correta

// Chama o método do DAO
$ret = $dao->CadastrarEducacaoFinanceira($titulo, $tipo, $nivel, $descricao, $idConta, $idUsuario);


