<?php
require_once 'DAO/ContaBancariaDAO.php';
require_once 'UtilDAO.php';

UtilDAO::UsuarioLogado();

if (!isset($_GET['id']) || is_numeric($_GET['id']) == false) {
    header('location: CConsultar_contaBancaria.php');
    exit;
}

$idConta = $_GET['id'];

$dao = new ContaBancariaDAO();

// Carrega dados da conta para edição
$conta = $dao->CarregarContaPorID($idConta, UtilDAO::UsuarioLogado());

if (count($conta) == 0) {
    header('location: CConsultar_contaBancaria.php?ret=0');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Conta Bancária</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">
    <?php include_once '_menu.php'; ?>

    <div id="page-wrapper">
        <div id="page-inner">

            <h2>Editar Conta Bancária</h2>
            <hr>

            <?php if (isset($_GET['ret'])) : ?>
                <div class="alert alert-warning">
                    Erro ao atualizar conta!
                </div>
            <?php endif; ?>

            <form action="CAtualizar_contaBancaria.php" method="post">
                <input type="hidden" name="idConta" value="<?= $conta['id_conta'] ?>">

                <div class="form-group">
                    <label>Nome do Banco:</label>
                    <input type="text" class="form-control" name="nomeBanco" value="<?= $conta['nome_banco'] ?>">
                </div>

                <div class="form-group">
                    <label>Número da Agência:</label>
                    <input type="text" class="form-control" name="numAgencia" value="<?= $conta['num_agencia'] ?>">
                </div>

                <div class="form-group">
                    <label>Número da Conta:</label>
                    <input type="text" class="form-control" name="numConta" value="<?= $conta['num_conta'] ?>">
                </div>

                <div class="form-group">
                    <label>Saldo Atual:</label>
                    <input type="text" class="form-control" name="saldoConta" value="<?= $conta['saldo_conta'] ?>">
                </div>

                <button class="btn btn-success">Salvar Alterações</button>
                <a href="CConsultar_contaBancaria.php" class="btn btn-default">Cancelar</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>
