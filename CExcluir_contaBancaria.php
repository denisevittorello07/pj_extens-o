<?php
require_once 'DAO/ContaBancariaDAO.php';
require_once 'UtilDAO.php';

UtilDAO::UsuarioLogado();

if (!isset($_GET['id']) || is_numeric($_GET['id']) == false) {
    header('location: CConsultar_contaBancaria.php?ret=0');
    exit;
}

$idConta = $_GET['id'];
$dao = new ContaBancariaDAO();

$ret = $dao->ExcluirConta($idConta, UtilDAO::UsuarioLogado());


