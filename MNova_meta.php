<?php require_once '_head.php'; ?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">

                <h2>Nova Meta Financeira</h2>
                <hr>

                <form action="MNova_meta.php" method="post">

                    <div class="form-group">
                        <label>Nome da Meta:</label>
                        <input type="text" name="nome_meta" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Valor da Meta:</label>
                        <input type="number" step="0.01" name="valor_meta" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Valor Atual:</label>
                        <input type="number" step="0.01" name="valor_atual" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Data Limite:</label>
                        <input type="date" name="data_limite" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Descrição:</label>
                        <textarea name="descricao_meta" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-success">Salvar</button>

                </form>

            </div>
        </div>
    </div>

</body>

</html>