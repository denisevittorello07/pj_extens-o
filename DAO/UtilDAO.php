<?php

// Classe de utilidades para sessão e conexão com o banco

class UtilDAO {

    // Simula o usuário logado (ID = 1)
    public static function UsuarioLogado() {
        return 1;
    }

    // MÉTODO DE CONEXÃO COM O BANCO DE DADOS
    public static function retornarConexao() {
        try {
            $conexao = new PDO(
                'mysql:host=localhost;dbname=bd_extensao;charset=utf8',
                'root',
                '' // senha padrão vazia no XAMPP
            );

            return $conexao;

        } catch (Exception $e) {
            echo 'Erro ao conectar ao banco: ' . $e->getMessage();
            die();
        }
    }
}
