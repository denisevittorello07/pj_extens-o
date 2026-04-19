<?php 
require_once 'DAO/GrupoFinanceiroDAO.php';

$dao = new GrupoFinanceiroDAO();
UtilDAO::UsuarioLogado();
$lista = $dao->CarregarGruposUsuario($idUsuario);
?>

<?php require_once '_head.php'; ?>

<body>

<?php include_once '_topo.php'; ?>
   
<?php include_once '_menu.php'; ?>


<div id="page-wrapper">
    <div id="page-inner">

        <h2>Meus Grupos Financeiros</h2>
        <hr>

        <a href="GNovo_grupoFinanceiro.php" class="btn btn-success">+ Novo Grupo</a>
        <br><br>

        <?php if (!empty($lista)) { ?>
            <table class="table table-bordered">
                <tr>
                    <th>Nome</th>
                    <th>Data Cadastro</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>

                <?php foreach ($lista as $l) { ?>
                    <tr>
                        <td><?= htmlspecialchars($l['nome_grupo']) ?></td>
                        <td><?= date("d/m/Y", strtotime($l['data_cadastro'])) ?></td>
                        <td><?= htmlspecialchars($l['descricao_grupo']) ?></td>
                        <td>
                            <a href="GEditar_grupoFinanceiro.php?cod=<?= $l['id_grupo'] ?>" class="btn btn-primary btn-sm">Editar</a>

                            <a href="GExcluir_grupoFinanceiro.php?cod=<?= $l['id_grupo'] ?>" 
                               onclick="return confirm('Confirmar exclusão?');"
                               class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>Nenhum grupo financeiro cadastrado.</p>
        <?php } ?>

    </div>
</div>

<?php require_once 'footer.php'; ?>
