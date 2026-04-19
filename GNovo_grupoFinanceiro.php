<?php require_once '_head.php'; ?>

<body>

    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">

                <h2>Novo Grupo Financeiro</h2>
                <hr>

                <form action="GNovo_grupoFinanceiro.php" method="post">
                    <div class="form-group">
                        <label>Nome do Grupo:</label>
                        <input type="text" name="nome_grupo" maxlength="60" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Data de Cadastro:</label>
                        <input type="date" name="data_cadastro" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Descrição:</label>
                        <textarea name="descricao_grupo" maxlength="200" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>