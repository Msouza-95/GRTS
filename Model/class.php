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


    public function buscClient()
    {
        $client = new clientDAO();
        return $client->buscClient($this);
    }


    public function newClient()
    {
        $client = new clientDAO();
        return $client->newClient($this);
    }

    public function delete()
    {
        $client = new clientDAO();
        return $client->delete($this);
    }

    public function DadosClient()
    {
        $client = new clientDAO();
        return $client->DadosClient($this);
    }
    public function ClietAll()
    {
        $client = new clientDAO();
        return $client->ClietAll();
    }

    public function upgradeClient($old)
    {
        $client = new clientDAO;
        return  $client->upgradeClient($this, $old);
    }
    public function getCNPJ()
    {
        return $this->cnpj;
    }
    public function setCNPJ($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }
    public function getResponsavel()
    {
        return $this->responsavel;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getNomeEmpresa()
    {
        return $this->nomeEmpresa;
    }
}
// fim class cliente

class endereco
{   protected $id;
    protected $idClinte;
    protected $numero;
    protected $cep;
    protected $logradouro;
    protected $complemto;
    protected $bairro;


    public function __construct($numero = "", $cep = "", $logradouro = "", $complemto = "", $bairro = "", $idClinte = "")
    {
        $this->numero = $numero;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->complemto = $complemto;
        $this->bairro = $bairro;
        $this->idClinte = $idClinte;
    }
    public function newEndereco()
    {
        $end = new enderecoDAO();

        return  $end->newEndereco($this);
    }
    public function upgradeEndereco($vcnpj)
    {
        $end = new enderecoDAO();
        return  $end->upgradeEndereco($this, $vcnpj);
    }
    public function buscEndereco()
    {
        $end = new enderecoDAO();
        return  $end->buscEndereco($this);
    }
    
    public function ClientEndereco() {
        $end = new enderecoDAO();
        return  $end->ClientEndereco($this);
    }
    public function deleteEndereco()
    {
        $end = new enderecoDAO();

        return  $end->deleteEndereco($this);
    }
    public function deleteEndereco2()
    {
        $end = new enderecoDAO();

        return  $end->deleteEndereco2($this);
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

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
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

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getComplemto()
    {
        return $this->complemto;
    }

    public function setComplemto($complemto)
    {
        $this->complemto = $complemto;

        return $this;
    }

    public function getIdBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}
//fim classe endereço 
class cidade
{
    protected $id;
    protected $descricao;
    protected $idEstado;

    public function __construct($descricao = "", $idEstado = "")
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

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

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

    public function buscEstado()
    {
        $UF = new estadoDAO();
        return $UF->buscEstado($this);
    }

    public function newEstado()
    {
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
        $this->descricao = $descricao;

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


class   bairro
{
    protected $descricao;
    protected $id;
    protected $idCidade;

    public function __construct($id = "", $descricao = "", $idCidade = "")
    {
        $this->descricao = $descricao;
        $this->id = $id;
        $this->idcidade = $idCidade;
    }

    public function getIdCidade()
    {
        return $this->idCidade;
    }
    public function setIdCIdade($bairro)
    {
        $this->idCidade = $bairro;
        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($bairro)
    {
        $this->descricao = $bairro;
        return $this;
    }


    public function buscBairro()
    {
        $bairro = new bairroDAO();
        return $bairro->buscBairro($this);
    }

    public function newBairro()
    {
        $bairro = new bairroDAO();
        return $bairro->newBairro($this);
    }
}

class generic
{

    public function GerarTable($dados, $Tipo)
    {
        $total = count($dados);
        
       if ($Tipo == 1) {

            for ($i = 0; $i < $total; $i++) {
                echo "<tr>";
                echo  "<td> <a href='modify.php?cnpj=" . $dados[$i][2] . "'>" . $dados[$i][0] . "</a> </td>"; // empresa
                echo  "<td> <a href='modify.php?cnpj=" . $dados[$i][2] . "'>" . $dados[$i][1] . "</a> </td>"; // responsavel
                echo  "<td> <a href='modify.php?cnpj=" . $dados[$i][2] . "'>" . $dados[$i][2] . "</a> </td>";; //cnpj
                echo  "<td> <a href='modify.php?cnpj=" . $dados[$i][2] . "'>" . $dados[$i][3] . "</a> </td>"; //telefone
                echo  "<td> <a href='modify.php?cnpj=" . $dados[$i][2] . "'>" . $dados[$i][4] . "</a> </td>"; //cidade 
                echo  "<td> <a href='modify.php?cnpj=" . $dados[$i][2] . "'>" . $dados[$i][5] . "</a> </td>"; //estado
                echo "</tr>";
            }
        } else {

            for ($i = 0; $i < $total; $i++) {
                echo "<tr>";
                echo  "<td> <a href='modify.php?cnpj=" . $dados[$i][2] . "'>" . $dados[$i][0] . "</a> </td>"; // empresa
                echo  "<td> <a href='modify.php?cnpj=" . $dados[$i][2] . "'>" . $dados[$i][2] . "</a> </td>"; // cnpj
                echo  "<td> <a href='modify.php?cnpj=" . $dados[$i][2] . "'>" . $dados[$i][1] . "</a> </td>";; //responsavel
                echo  "<td> <a href='../../controller/controllerDelete.php?cnpj=" . $dados[$i][2] . "'>Delete</a> </td>"; //cidade 
                echo  "<td> <a  href='modify.php?cnpj=" . $dados[$i][2] . "'>Alterar</a> </td>"; //estado
                echo "</tr>";
            }
        }
    }
}
?>