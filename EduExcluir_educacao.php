<?php

require_once 'DAO/EducacaoFinanceiraDAO.php';

$dao = new EducacaoFinanceiraDAO();

// Verifica se o ID veio pela URL
if (!isset($_GET['cod']) || empty($_GET['cod'])) {
    echo "<script>alert('Conteúdo inválido!'); 
          window.location='EduConsultar_educacao.php';</script>";
    exit;
}

$idConteudo = $_GET['cod'];
$idUsuario = 1; // depois substitui pela variável da sessão

// Chama o DAO para excluir
$ret = $dao->ExcluirEducacaoFinanceira($idConteudo, $idUsuario);


