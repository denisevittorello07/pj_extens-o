<?php
require_once 'DAO/EducacaoFinanceiraDAO.php';

$dao = new EducacaoFinanceiraDAO();

// Verifica se o ID foi passado pela URL
if (!isset($_GET['cod']) || empty($_GET['cod'])) {
    echo "<script>alert('Conteúdo inválido!'); window.location='consultar_educacao.php';</script>";
    exit;
}

$idConteudo = $_GET['cod'];

// Carrega o conteúdo selecionado
$conteudo = $dao->CarregarEducacaoUsuario($idConteudo);

// Caso não encontre:
if (count($conteudo) == 0) {
    echo "<script>alert('Conteúdo não encontrado!'); window.location='consultar_educacao.php';</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Conteúdo - Educação Financeira</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <style>
        body { padding: 20px; }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 8px rgba(0,0,0,0.15);
            max-width: 900px;
            margin: auto;
        }
    </style>
</head>

<body>

    <div class="card">

        <h2>Editar Conteúdo – Educação Financeira</h2>
        <p>Altere as informações abaixo e salve as modificações.</p>

        <form action="EduEditar_educacao.php" method="POST">

            <!-- Envia o ID oculto -->
            <input type="hidden" name="idConteudo" value="<?= $conteudo[0]['id_conteudo'] ?>">

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" id="titulo" class="form-control"
                       value="<?= $conteudo[0]['titulo'] ?>" required>
            </div>

            <br>

            <div class="form-group">
                <label for="conteudo">Conteúdo:</label>
                <textarea name="conteudo" id="conteudo" class="form-control" rows="8"
                          required><?= $conteudo[0]['conteudo'] ?></textarea>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="EduConsultar_educacao.php" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>

</body>
</html>
