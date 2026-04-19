<?php
require_once 'DAO/EducacaoFinanceiraDAO.php';
require_once 'DAO/UtilDAO.php';

// Verifica sessão
UtilDAO::UsuarioLogado();

$dao = new EducacaoFinanceiraDAO();
$mensagem = '';

if (isset($_POST['btnCadastrar'])) {
    $titulo = trim($_POST['titulo']);
    $descricao = trim($_POST['descricao']);
    $categoria = trim($_POST['categoria']);
    $autor = trim($_POST['autor']);
    $idUsuario = UtilDAO::UsuarioLogado();

    $ret = $dao->CadastrarEducacaoFinanceira($titulo, $tipo, $nivel, $descricao, $idConta, $idUsuario);

}
?>

<?php include_once '_head.php'; ?>
<?php include_once '_menu.php'; ?>

<div id="page-wrapper">
    <div id="page-inner">

        <h2>Adicionar Conteúdo de Educação Financeira</h2>
        <hr>

        <?= $mensagem ?>

        <form method="post" action="Educacao_financeira.php">

            <div class="form-group">
                <label>Título *</label>
                <input type="text" name="titulo" class="form-control" placeholder="Digite o título do conteúdo">
            </div>

            <div class="form-group">
                <label>Descrição *</label>
                <textarea name="descricao" class="form-control" rows="4" placeholder="Digite a descrição"></textarea>
            </div>

            <div class="form-group">
                <label>Categoria *</label>
                <input type="text" name="categoria" class="form-control" placeholder="Ex.: Investimentos, Orçamento, Economia">
            </div>

            <div class="form-group">
                <label>Autor *</label>
                <input type="text" name="autor" class="form-control" placeholder="Nome do autor">
            </div>

            <button class="btn btn-success" name="btnCadastrar">Salvar</button>
            <a href="EduConsultar_educacao.php" class="btn btn-info">Voltar</a>

        </form>

    </div>
</div>

<?php include_once 'footer.php'; ?>
