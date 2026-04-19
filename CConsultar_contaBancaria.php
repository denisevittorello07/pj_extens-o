<?php
require_once 'DAO/ContaBancariaDAO.php';
require_once __DIR__ . '/DAO/UtilDAO.php';

UtilDAO::UsuarioLogado();

$dao = new ContaBancariaDAO();

// Carrega todas as contas do usuário logado
$contas = $dao->CarregarContasUsuario(UtilDAO::UsuarioLogado());
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Contas Bancárias</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">
    <?php include_once '_head.php'; ?>
    <?php include_once '_topo.php'; ?>
    <?php include_once '_menu.php'; ?>



    <div id="page-wrapper">
        <div id="page-inner">

            <h2>Consultar Contas Bancárias</h2>
            <hr>

            <?php if (isset($_GET['ret']) && $_GET['ret'] == 1) : ?>
                <div class="alert alert-success">Conta excluída com sucesso!</div>
            <?php endif; ?>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Banco</th>
                        <th>Agência</th>
                        <th>Conta</th>
                        <th>Saldo</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                <?php for ($i = 0; $i < count($contas); $i++) : ?>
                    <tr>
                        <td><?= $contas[$i]['nome_banco'] ?></td>
                        <td><?= $contas[$i]['num_agencia'] ?></td>
                        <td><?= $contas[$i]['num_conta'] ?></td>
                        <td>R$ <?= number_format($contas[$i]['saldo_conta'], 2, ',', '.') ?></td>

                        <td>
                            <a href="CEditar_contaBancaria.php?id=<?= $contas[$i]['id_conta'] ?>" class="btn btn-primary btn-sm">
                                Editar
                            </a>

                            <a href="CExcluir_contaBancaria.php?id=<?= $contas[$i]['id_conta'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Deseja realmente excluir esta conta?')">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
