<?php
require_once 'DAO/GrupoFinanceiroDAO.php';

$dao = new GrupoFinanceiroDAO();
$id = $_GET['cod'];

$grupo = $dao->CarregarGruposUsuario($idUsuario);
$g = $grupo[0];
?>

<?php require_once '_head.php'; ?>

<div id="page-wrapper">
<div id="page-inner">

<h2>Editar Grupo Financeiro</h2>
<hr>

<form action="GEditar_grupoFinanceiro.php" method="post">

    <input type="hidden" name="id_grupo" value="<?= $g['id_grupo'] ?>">

    <div class="form-group">
        <label>Nome do Grupo:</label>
        <input type="text" name="nome_grupo" maxlength="60" class="form-control" value="<?= $g['nome_grupo'] ?>">
    </div>

    <div class="form-group">
        <label>Data de Cadastro:</label>
        <input type="date" name="data_cadastro" class="form-control" value="<?= $g['data_cadastro'] ?>">
    </div>

    <div class="form-group">
        <label>Descrição:</label>
        <textarea name="descricao_grupo" maxlength="200" class="form-control"><?= $g['descricao_grupo'] ?></textarea>
    </div>

    <button class="btn btn-success">Atualizar</button>

</form>

</div></div>

<?php require_once 'footer.php'; ?>
