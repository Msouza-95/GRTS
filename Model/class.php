<?php
include_once "classDAO.php";

class cliente
{

    protected $id;
    protected $nomeEmpresa;
    protected $responsavel;
    protected $cnpj;
    protected $telefone;

    public function __construct($id = "", $nomeEmpresa = "", $responsavel = "", $cnpj = "", $telefone = "")
    {
        $this->id = $id;
        $this->nomeEmpresa = $nomeEmpresa;
        $this->responsavel = $responsavel;
        $this->cnpj = $cnpj;
        $this->telefone = $telefone;
    }
}

// fim class cliente

class endereco
{
    protected $idClinte;
    protected $numero;
    protected $cep;
    protected $logradouro;
    protected $complemto;
    protected $cidade;
    protected $estado;

    public function __construct($idClinte = "", $numero = "", $cep = "", $logradouro = "", $complemto = "", $cidade = "", $estado = "")
    {
        $this->idClinte = $idClinte;
        $this->numero = $numero;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->complemto = $complemto;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }
}

class user
{
    protected $login;
    protected $senha;

    public function __construct($login = "", $senha = "")
    {
        $this->login = $login;
        $this->senha = $senha;
    }

    public function checkLogin()
    {
        $user = new userDAO();
        
        return $user->checkLogin($this);
        
    }
    public function getLogin()
    {
        return $this->login;
    }

    public function seLogin($login)
    {
        $this->login = $login;

        return $this;
    }


    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
}
