<?php
// editar_transacao.php
require_once 'DAO/TransacaoFinanceiraDAO.php';
require_once 'DAO/GrupoFinanceiroDAO.php';
require_once 'DAO/MetaFinanceiraDAO.php';
require_once 'DAO/ContaBancariaDAO.php';
require_once 'UtilDAO.php';

UtilDAO::UsuarioLogado();
$idUsuario = UtilDAO::UsuarioLogado();

if (!isset($_GET['cod']) || empty($_GET['cod'])) {
    echo "<script>alert('Transação inválida!'); window.location='TransConsultar_transacao.php';</script>";
    exit;
}

$idTransacao = $_GET['cod'];
$dao = new TransacaoFinanceiraDAO();
$registro = $dao->CarregarTransacoesUsuario($idUsuario);

if (empty($registro)) {
    echo "<script>alert('Transação não encontrada!'); window.location='TransConsultar_transacao.php';</script>";
    exit;
}

$registro = $registro[0];

$grupoDao = new GrupoFinanceiroDAO();
$metaDao  = new MetaFinanceiraDAO();
$contaDao = new ContaBancariaDAO();

$grupos = $grupoDao->CarregarGruposUsuario($idUsuario);
$metas  = $metaDao->CarregarMinhasMetas($idUsuario);
$contas = $contaDao->CarregarContasUsuario($idUsuario);
?>

<?php include_once '_head.php'; ?>
<?php include_once '_menu.php'; ?>

<div id="page-wrapper">
  <div id="page-inner">
    <h2>Editar Transação</h2>
    <hr>

    <form action="TransEditar_transacao.php" method="POST">

      <input type="hidden" name="idTransacao" value="<?= $registro['id_transacao'] ?>">

      <div class="form-group">
        <label>Tipo *</label>
        <select name="tipo" class="form-control" required>
          <option value="">Selecione...</option>
          <option value="1" <?= ($registro['tipo_transacao'] == 1) ? 'selected' : '' ?>>Entrada</option>
          <option value="2" <?= ($registro['tipo_transacao'] == 2) ? 'selected' : '' ?>>Saída</option>
        </select>
      </div>

      <div class="form-group">
        <label>Data *</label>
        <input type="date" name="data" class="form-control" required value="<?= $registro['data_transacao'] ?>">
      </div>

      <div class="form-group">
        <label>Valor (R$) *</label>
        <input type="number" step="0.01" name="valor" class="form-control" required value="<?= $registro['valor_transacao'] ?>">
      </div>

      <div class="form-group">
        <label>Observação</label>
        <textarea name="obs" class="form-control" rows="3"><?= htmlspecialchars($registro['obs_transacao']) ?></textarea>
      </div>

      <div class="form-group">
        <label>Grupo (opcional)</label>
        <select name="idGrupo" class="form-control">
          <option value="">-- Nenhum --</option>
          <?php if (!empty($grupos) && is_array($grupos)): ?>
            <?php foreach ($grupos as $g): ?>
              <option value="<?= $g['id_grupo'] ?>" <?= ($registro['id_grupo'] == $g['id_grupo']) ? 'selected' : '' ?>><?= htmlspecialchars($g['nome_grupo']) ?></option>
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
              <option value="<?= $m['id_meta'] ?>" <?= ($registro['id_meta'] == $m['id_meta']) ? 'selected' : '' ?>><?= htmlspecialchars($m['nome_meta']) ?></option>
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
              <option value="<?= $c['id_conta'] ?>" <?= ($registro['id_conta'] == $c['id_conta']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['nome_banco']) ?> - <?= htmlspecialchars($c['num_conta']) ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <button class="btn btn-primary" type="submit">Salvar Alterações</button>
      <a href="TransConsultar_transacao.php" class="btn btn-secondary">Cancelar</a>

    </form>
  </div>
</div>

<?php include_once 'footer.php'; ?>
