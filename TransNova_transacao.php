<?php
// nova_transacao.php
require_once 'DAO/TransacaoFinanceiraDAO.php';
require_once 'DAO/GrupoFinanceiroDAO.php';
require_once 'DAO/MetaFinanceiraDAO.php';
require_once 'DAO/ContaBancariaDAO.php';
require_once 'DAO/UtilDAO.php';



UtilDAO::UsuarioLogado();
$idUsuario = UtilDAO::UsuarioLogado();

$grupoDao = new GrupoFinanceiroDAO();
$metaDao  = new MetaFinanceiraDAO();
$contaDao = new ContaBancariaDAO();

$grupos = $grupoDao->CarregarGruposUsuario($idUsuario); // deve retornar array
$metas  = $metaDao->CarregarMinhasMetas($idUsuario);
$contas = $contaDao->CarregarContasUsuario($idUsuario);

$mensagem = '';
if (isset($_GET['msg'])) {
    $mensagem = "<div class='alert alert-info'>".htmlspecialchars($_GET['msg'])."</div>";
}
?>

<?php include_once '_head.php'; ?>
<?php include_once '_topo.php'; ?>
<?php include_once '_menu.php'; ?>

<div id="page-wrapper">
  <div id="page-inner">
    <h2>Nova Transação Financeira</h2>
    <hr>
    <?= $mensagem ?>

    <form action="TransNova_transacao.php" method="POST">

      <div class="form-group">
        <label>Tipo *</label>
        <select name="tipo" class="form-control" required>
          <option value="">Selecione...</option>
          <option value="1">Entrada</option>
          <option value="2">Saída</option>
        </select>
      </div>

      <div class="form-group">
        <label>Data *</label>
        <input type="date" name="data" class="form-control" required value="<?= date('Y-m-d') ?>">
      </div>

      <div class="form-group">
        <label>Valor (R$) *</label>
        <input type="number" step="0.01" name="valor" class="form-control" required>
      </div>

      <div class="form-group">
        <label>Observação</label>
        <textarea name="obs" class="form-control" rows="3"></textarea>
      </div>

      <div class="form-group">
        <label>Grupo (opcional)</label>
        <select name="idGrupo" class="form-control">
          <option value="">-- Nenhum --</option>
          <?php if (!empty($grupos) && is_array($grupos)): ?>
            <?php foreach ($grupos as $g): ?>
              <option value="<?= $g['id_grupo'] ?>"><?= htmlspecialchars($g['nome_grupo']) ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Meta (opcional)</label>
        <select name="idMeta" class="form-control">
          <option value="">-- Nenhuma --</option>
          <?php if (!empty($metas) && is_array($metas)): ?>
            <?php foreach ($metas as $m): ?>
              <option value="<?= $m['id_meta'] ?>"><?= htmlspecialchars($m['nome_meta']) ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="form-group">
        <label>Conta *</label>
        <select name="idConta" class="form-control" required>
          <option value="">Selecione...</option>
          <?php if (!empty($contas) && is_array($contas)): ?>
            <?php foreach ($contas as $c): ?>
              <option value="<?= $c['id_conta'] ?>">
                <?= htmlspecialchars($c['nome_banco']) ?> - <?= htmlspecialchars($c['num_conta']) ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <button class="btn btn-success" type="submit">Salvar</button>
      <a href="TransConsultar_transacao.php" class="btn btn-secondary">Voltar</a>

    </form>
  </div>
</div>

<?php include_once 'footer.php'; ?>

