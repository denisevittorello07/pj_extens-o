<?php
require_once 'DAO/MetaFinanceiraDAO.php';
$dao = new MetaFinanceiraDAO();

$id = $_GET['cod'];
$meta = $dao->CarregarMinhasMetas($idUsuario);
$m = $meta[0];
?>

<?php require_once '_head.php'; ?>

<div id="page-wrapper">
<div id="page-inner">

<h2>Editar Meta Financeira</h2>
<hr>

<form action="MEditar_meta.php" method="post">

    <input type="hidden" name="id_meta" value="<?= $m['id_meta'] ?>">

    <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome_meta" class="form-control" value="<?= $m['nome_meta'] ?>">
    </div>

    <div class="form-group">
        <label>Valor Meta:</label>
        <input type="number" step="0.01" name="valor_meta" class="form-control" value="<?= $m['valor_meta'] ?>">
    </div>

    <div class="form-group">
        <label>Valor Atual:</label>
        <input type="number" step="0.01" name="valor_atual" class="form-control" value="<?= $m['valor_atual'] ?>">
    </div>

    <div class="form-group">
        <label>Data Limite:</label>
        <input type="date" name="data_limite" class="form-control" value="<?= $m['data_limite'] ?>">
    </div>

    <div class="form-group">
        <label>Descrição:</label>
        <textarea name="descricao_meta" class="form-control"><?= $m['descricao_meta'] ?></textarea>
    </div>

    <button class="btn btn-success">Atualizar</button>

</form>

</div>
</div>

<?php require_once 'footer.php'; ?>
