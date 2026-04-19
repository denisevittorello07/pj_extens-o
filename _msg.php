<?php

// Caso exista na URL uma chave com nome ret e um valor numérico,
// esta validação vai identificar e apresentar a mensagem na tela para o usuário.

if (isset($_GET['ret'])) {

    $ret = $_GET['ret'];

    switch ($ret) {

        // ==========================
        // SALVAR TRANSAÇÃO
        // ==========================

        case -1:
            echo '<div class="alert alert-success">Transação cadastrada com SUCESSO!</div>';
            break;

        case 0:
            echo '<div class="alert alert-warning">Preencha todos os campos OBRIGATÓRIOS!</div>';
            break;

        case -2:
            echo '<div class="alert alert-danger">Tipo de transação INVÁLIDO!</div>';
            break;

        case -3:
            echo '<div class="alert alert-warning">Valor da transação INVÁLIDO!</div>';
            break;


        // ==========================
        // EXCLUIR TRANSAÇÃO
        // ==========================

        case -4:
            echo "<script>alert('Transação excluída com sucesso!'); window.location='consultar_transacao.php';</script>";
            break;

        case -5:
            echo "<script>alert('Dados inválidos!'); window.location='consultar_transacao.php';</script>";
            break;


        // ==========================
        // ATUALIZAR TRANSAÇÃO
        // ==========================

        case -6:
            echo "<script>alert('Transação atualizada com sucesso!'); window.location='consultar_transacao.php';</script>";
            exit;

        case -7:
            echo "<script>alert('Preencha todos os campos obrigatórios.'); window.history.back();</script>";
            exit;

        case -8:
            echo "<script>alert('ID inválido.'); window.history.back();</script>";
            exit;


        // ==========================
        // SALVAR META
        // ==========================

        case -9:
            echo "<script>alert('Meta cadastrada com sucesso!'); window.location='consultar_meta.php';</script>";
            break;


        // ==========================
        // EXCLUIR META
        // ==========================

        case -10:
            echo "<script>alert('Meta excluída com sucesso!'); window.location='consultar_meta.php';</script>";
            break;


        // ==========================
        // ATUALIZAR META
        // ==========================

        case -11:
            echo "<script>alert('Meta atualizada com sucesso!'); window.location='consultar_meta.php';</script>";
            break;


            
        // ==========================
        // CONSULTAR META
        // ==========================
    
            case -26:
            echo "<script>alert('Usuário não encontrado.');</script>";
            break;

        case -27:
            echo "<script>alert('Ocorreu um erro ao carregar suas metas. Tente novamente mais tarde.');</script>";
            break;

        case -28:
            echo "<script>alert('Nenhuma meta encontrada.');</script>";
            break;

        case -29:
            echo "<script>alert('Meta cadastrada com sucesso!');</script>";
            break;

        case -30:
            echo "<script>alert('Meta atualizada com sucesso!');</script>";
            break;

        case -31:
            echo "<script>alert('Meta excluída com sucesso!');</script>";
            break;


        // ==========================
        // SALVAR GRUPO FINANCEIRO
        // ==========================

        case -12:
            echo "<script>alert('Grupo cadastrado com sucesso!'); window.location='consultar_grupo_financeiro.php';</script>";
            break;


        // ==========================
        // EXCLUIR GRUPO FINANCEIRO
        // ==========================

        case -13:
            echo "<script>alert('Grupo excluído com sucesso!'); window.location='consultar_grupo_financeiro.php';</script>";
            break;


        // ==========================
        // ATUALIZAR GRUPO FINANCEIRO
        // ==========================

        case -14:
            echo "<script>alert('Grupo atualizado com sucesso!'); window.location='consultar_grupo_financeiro.php';</script>";
            break;
            

            
        // ==========================
        // EDUCAÇÃO FINANCEIRA
        // ==========================

            case -24:
        echo "<script>
                alert('Conteúdo cadastrado com sucesso!');
                window.location='consultar_educacao.php';
              </script>";
        break;

    case -25:
        echo "<script>
                alert('Preencha todos os campos obrigatórios.');
                window.location='consultar_educacao.php';
              </script>";
        break;



        // ==========================
        // SALVAR EDUCAÇÃO FINANCEIRA
        // ==========================

        case -15:
            echo "<script>alert('Conteúdo cadastrado com sucesso!'); window.location='consultar_educacao.php';</script>";
            break;

        case -16:
            echo "<script>alert('Preencha todos os campos!'); window.history.back();</script>";
            break;


        // ==========================
        // EXCLUIR EDUCAÇÃO FINANCEIRA
        // ==========================

        case -17:
            echo "<script>alert('Conteúdo excluído com sucesso!'); window.location='consultar_educacao.php';</script>";
            break;

        case -18:
            echo "<script>alert('Conteúdo inválido!'); window.location='consultar_educacao.php';</script>";
            break;


        // ==========================
        // ATUALIZAR EDUCAÇÃO FINANCEIRA
        // ==========================

        case -19:
            echo "<script>alert('Conteúdo atualizado com sucesso!'); window.location='consultar_educacao.php';</script>";
            break;

        case -20:
            echo "<script>alert('Preencha todos os campos!'); window.history.back();</script>";
            break;

        case -21:
            echo "<script>alert('ID do conteúdo inválido!'); window.history.back();</script>";
            break;



        // ==========================
        // EXCLUIR CONTA BANCÁRIA
        // ==========================

        case -22:
            header('location: consultar_conta.php?ret=1');
            exit;


        // ==========================
        // ATUALIZAR CONTA BANCÁRIA
        // ==========================

        case -23:
            header('location: consultar_conta.php?ret=2');
            exit;


        // ==========================
        // DEFAULT FINAL — ÚNICO
        // ==========================

        default:
            echo "<script>alert('Erro inesperado.'); window.history.back();</script>";
            break;
    }
}

?>
