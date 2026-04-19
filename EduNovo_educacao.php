<?php
// novo_conteudo.php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Conteúdo - Educação Financeira</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style>
        body { padding: 20px; }
        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>

<body>

    <div class="card">

        <h2>Novo Conteúdo – Educação Financeira</h2>
        <p>Preencha os campos abaixo para adicionar um novo conteúdo educativo.</p>

        <form action="EduNovo_educacao.php" method="POST">

            <div class="form-group">
                <label for="titulo">Título do Conteúdo:</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
            </div>

            <br>

            <div class="form-group">
                <label for="conteudo">Texto / Conteúdo:</label>
                <textarea name="conteudo" id="conteudo" class="form-control" rows="8" required></textarea>
            </div>

            <br>

            <button type="submit" class="btn btn-success">Salvar Conteúdo</button>
            <a href="EduConsultar_educacao.php" class="btn btn-secondary">Cancelar</a>

        </form>

    </div>

</body>
</html>
