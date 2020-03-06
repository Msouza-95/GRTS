<?php
include_once "classDAO.php";

class cliente
{

    protected $id;
    protected $nomeEmpresa;
    protected $responsavel;
    protected $cnpj;
    protected $telefone;

    public function __construct($nomeEmpresa = "", $responsavel = "", $cnpj = "", $telefone = "")
    {
        
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
  

    public function __construct($numero = "", $cep = "", $logradouro = "", $complemto = "", $cidade = "", $idClinte = "")
    {
        $this->numero = $numero;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->complemto = $complemto;
        $this->cidade = $cidade;
        $this->idClinte = $idClinte;
    }

    public function newEndereco(){
        $end = new enderecoDAO(); 

        return  $end->newEndereco($this); 
    }
    public function getIdCliente()
    {
        return $this->idClinte;
    }

    public function seIdCliente($id)
    {
        $this->idClinte = $id;

        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function seNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function seCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function seLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getComplemto()
    {
        return $this->complemto;
    }

    public function setComplemtp($complemto)
    {
        $this->complemto = $complemto;

        return $this;
    }

    public function getidCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado= $estado;

        return $this;
    }
}
//fim classe endereço 
class cidade {
    protected $id;
    protected $descricao;
    protected $idEstado;

    public function __construct($descricao="", $idEstado="")
    {
        $this->descricao = $descricao;
        $this->idEstado = $idEstado; 
    }

    public function buscCidade()
    {
        $city = new cidadeDAO();
        return $city->buscCidade($this); 
    }

    public function newCidade()
    {
        $city = new cidadeDAO();
        return $city->newCidade($this); 
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getdescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao= $descricao;

        return $this;
    }

    public function getIdEstado()
    {
        return $this->idEstado;
    }

    public function seTIdEstado($idEstado)
    {
        $this->idEstado = $idEstado;

        return $this;
    }

}

class estado 
{
    protected $id;
    protected $descricao; 

    public function buscEstado(){
        $UF = new estadoDAO();
        return $UF->buscEstado($this);
    }

    public function newEstado(){
        $UF = new estadoDAO();
        return $UF->newEstado($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getdescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao= $descricao;

        return $this;
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
