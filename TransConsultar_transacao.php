<?php
// consultar_transacao.php
require_once 'DAO/TransacaoFinanceiraDAO.php';
require_once 'DAO/UtilDAO.php';

UtilDAO::UsuarioLogado();
$idUsuario = UtilDAO::UsuarioLogado();

$dao = new TransacaoFinanceiraDAO();
$transacoes = $dao->CarregarTransacoesUsuario($idUsuario);
if (!is_array($transacoes)) {
    $transacoes = [];
}

include_once '_head.php'; 
include_once '_topo.php'; 
include_once '_menu.php'; 
?>

<div id="page-wrapper">
  <div id="page-inner">
    <h2>Consulta de Transações</h2>
    <hr>

    <a href="TransConsultar_transacao.php" class="btn btn-success">Nova Transação</a>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Data</th>
            <th>Tipo</th>
            <th>Valor (R$)</th>
            <th>Conta</th>
            <th>Grupo</th>
            <th>Meta</th>
            <th>Observação</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($transacoes)): ?>
            <?php foreach ($transacoes as $t): ?>
              <tr>
                <td><?= date('d/m/Y', strtotime($t['data_transacao'])) ?></td>
                <td><?= ($t['tipo_transacao'] == 1) ? 'Entrada' : 'Saída' ?></td>
                <td><?= number_format($t['valor_transacao'], 2, ',', '.') ?></td>
                <td><?= htmlspecialchars(($t['nome_banco'] ?? '') . ' ' . ($t['num_conta'] ?? '')) ?></td>
                <td><?= htmlspecialchars($t['nome_grupo'] ?? '') ?></td>
                <td><?= htmlspecialchars($t['nome_meta'] ?? '') ?></td>
                <td><?= htmlspecialchars($t['obs_transacao']) ?></td>
                <td>
                  <a href="TransEditar_transacao.php?cod=<?= $t['id_transacao'] ?>" class="btn btn-primary btn-sm">Editar</a>
                  <a href="TransExcluir_transacao.php?cod=<?= $t['id_transacao'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir esta transação?')">Excluir</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="8" class="text-center">Nenhuma transação encontrada.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

<?php include_once __DIR__ . '/../footer.php'; ?>


