<?php
require_once 'DAO/MetaFinanceiraDAO.php';
$dao = new MetaFinanceiraDAO();
$usuarioId = UtilDAO::UsuarioLogado();

// Carregar metas do usuário
$lista = $dao->CarregarMinhasMetas($usuarioId);

// Definir código de mensagem para alertas
$msg_codigo = null;

if ($lista === 0) {
    $msg_codigo = -26; // Usuário não encontrado
} elseif ($lista === -1) {
    $msg_codigo = -27; // Erro ao carregar metas
} elseif (is_array($lista) && count($lista) === 0) {
    $msg_codigo = -28; // Nenhuma meta encontrada
}

// Inclui o cabeçalho
require_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <h2>Minhas Metas Financeiras</h2>
                <hr>

                <?php include_once '_msg.php'; ?>

                <table class="table table-bordered">
                    <tr>
                        <th>Nome</th>
                        <th>Valor Meta</th>
                        <th>Atual</th>
                        <th>Data Limite</th>
                        <th>Ações</th>
                    </tr>

                    <?php foreach ($lista as $l): ?>
                        <tr>
                            <td><?= htmlspecialchars($l['nome_meta']) ?></td>
                            <td>R$ <?= number_format($l['valor_meta'], 2, ',', '.') ?></td>
                            <td>R$ <?= number_format($l['valor_atual'], 2, ',', '.') ?></td>
                            <td><?= date('d/m/Y', strtotime($l['data_limite'])) ?></td>
                            <td>
                                <a href="MEditar_meta.php?cod=<?= $l['id_meta'] ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="MExcluir_meta.php?cod=<?= $l['id_meta'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Deseja excluir esta meta?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <!-- <?php if (is_array($lista) && count($lista) > 0): ?>
                <div class="alert alert-info">Nenhuma meta encontrada.</div><?php endif; ?> -->

            </div>
        </div>
    </div>

</body>

</html>