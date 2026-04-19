<?php

class Usuario
{
    private $idUsuario;
    private $nomeUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $dataNascimento;
    private $dataCadastro;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($id)
    {
        $this->idUsuario = $id;
    }

    public function getNomeUsuario()
    {
        return $this->nomeUsuario;
    }

    public function setNomeUsuario($nome)
    {
        $this->nomeUsuario = $nome;
    }

    public function getEmailUsuario()
    {
        return $this->emailUsuario;
    }

    public function setEmailUsuario($email)
    {
        $this->emailUsuario = $email;
    }

    public function getSenhaUsuario()
    {
        return $this->senhaUsuario;
    }

    public function setSenhaUsuario($senha)
    {
        // Sempre armazena senha criptografada
        $this->senhaUsuario = hash('sha256', $senha);
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($data)
    {
        $this->dataNascimento = $data;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setDataCadastro($data)
    {
        $this->dataCadastro = $data;
    }
}
