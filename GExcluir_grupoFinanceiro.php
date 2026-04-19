<?php

require_once 'DAO/GrupoFinanceiroDAO.php';

$dao = new GrupoFinanceiroDAO();

$id = $_GET['cod'];

$dao->ExcluirGrupoFinanceiro($idGrupo);


