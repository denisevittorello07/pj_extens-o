<?php
require_once 'DAO/ContaBancariaDAO.php';
require_once 'UtilDAO.php';

UtilDAO::UsuarioLogado();

if (isset($_POST['nomeBanco'])) {

    $nomeBanco   = trim($_POST['nomeBanco']);
    $numAgencia  = trim($_POST['numAgencia']);
    $numConta    = trim($_POST['numConta']);
    $saldoConta  = trim($_POST['saldoConta']);
    $idUsuario   = UtilDAO::UsuarioLogado();

    // Instancia o DAO
    $dao = new ContaBancariaDAO();

    // Chama o método de inserir
    $ret = $dao->CadastrarConta($nomeBanco, $numAgencia, $numConta, $saldoConta, $idUsuario);

} else {
    // Se alguém tentou acessar pela URL, volta para a tela inicial
    header("location: CNova_contaBancaria.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="container">
    <?php if ($ret == 1) : ?>
        <div class="alert alert-success">
            Conta cadastrada com sucesso!
        </div>
        <a href="CConsultar_contaBancaria.php" class="btn btn-primary">Consultar Contas</a>
        <a href="CNova_contaBancaria.php" class="btn btn-secondary">Cadastrar Outra</a>

    <?php else : ?>
        <div class="alert alert-danger">
            Ocorreu um erro ao salvar os dados.
        </div>
        <a href="CNova_contaBancaria.php" class="btn btn-warning">Tentar Novamente</a>
    <?php endif; ?>
</div>

</body>
</html>
