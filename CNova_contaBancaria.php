<?php
require_once __DIR__ . '/DAO/UtilDAO.php';
UtilDAO::UsuarioLogado(); 
?>

<?php require_once '_head.php'; ?>
<body>

<?php include_once '_topo.php'; ?>
<?php include_once '_menu.php'; ?>

<div class="container" style="margin-left:260px; padding-top:40px;">

    <h2>Cadastrar Nova Conta Bancária</h2>

    <form action="CNova_contaBancaria.php" method="post">

        <div class="form-group">
            <label>Nome do Banco:</label>
            <input type="text" name="nomeBanco" class="form-control">
        </div>

        <div class="form-group">
            <label>Número da Agência:</label>
            <input type="text" name="numAgencia" class="form-control">
        </div>

        <div class="form-group">
            <label>Número da Conta:</label>
            <input type="text" name="numConta" class="form-control">
        </div>

        <div class="form-group">
            <label>Saldo Inicial:</label>
            <input type="number" step="0.01" name="saldoConta" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        <a href="CConsultar_contaBancaria.php" class="btn btn-secondary mt-3">Voltar</a>

    </form>
</div>

</body>
</html>
