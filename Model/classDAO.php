<?php
require_once "connectionFactory.php";

class clientDAO
{
    public function buscClient($client)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("select cnpj from grts.Empresa where cnpj = :cnpj");

            $sql->bindParam("cnpj", $cnpj);
            $cnpj = $client->getCNPJ();

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['cnpj']);
                $i++;
            }
            return $vet;
        } catch (PDOException $Erro) {
            echo "Erro ao busca client :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }


    public function upgradeClient($client, $velho)
    {

        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("update  grts.empresa set nome =:nome, telefone = :tel , responsavel = :resp, cnpj =:cnpj where cnpj = :velho");

            $sql->bindParam("cnpj", $cnpj);
            $sql->bindParam("nome", $nome);
            $sql->bindParam("tel", $tel);
            $sql->bindParam("resp", $resp);
            $sql->bindParam("velho", $velo);

            $cnpj = $client->getCNPJ();
             $nome = $client->getNomeEmpresa();
            $tel = $client->getTelefone();
            $resp = $client->getResponsavel(); 




           return $sql->execute();
    
            
        } catch (PDOException $Erro) {
            echo "Erro ao update  :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }

    public function delete($client)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("delete from grts.endereco where cnpjempresa =:cnpj");

            $sql->bindParam("cnpj", $cnpj);
            $cnpj = $client->getCNPJ();


            $sql->execute();

            if ($sql->rowCount() != null) {
                $sql2 = $myconnection->prepare("delete from grts.empresa where cnpj =:cnpj");
                $sql2->bindParam("cnpj", $cnpj);

                $sql2->execute();

                return $sql2->rowCount();
            }
        } catch (PDOException $Erro) {
            echo "Erro ao DELETAR  :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }

    public function ClietAll()
    {

        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("select e.nome as empresa, e.responsavel, e.cnpj, e.telefone, c.descricao as cidade , uf.descricao as estado
            from grts.empresa e inner join grts.endereco en on e.cnpj = en.cnpjempresa inner join grts.cidade c
             on c.id = en.idcidade inner join grts.estado uf on c.idestado= uf.id");

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['empresa'], $linha['responsavel'], $linha['cnpj'], $linha['telefone'], $linha['cidade'], $linha['estado']);
                $i++;
            }
            return $vet;
        } catch (PDOException $Erro) {
            echo "erro ao buscar todos os dados :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }


    public function DadosClient($client)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("select e.nome as empresa, e.responsavel, e.cnpj, e.telefone,en.numero,en.cep,en.complemento,en.logradouro, c.descricao as cidade , uf.descricao as estado
            from grts.empresa e inner join grts.endereco en on e.cnpj = en.cnpjempresa inner join grts.cidade c
             on c.id = en.idcidade inner join grts.estado uf on c.idestado= uf.id where e.cnpj =:cnpj ");

            $sql->bindParam("cnpj", $cnpj);
            $cnpj = $client->getCNPJ();

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['empresa'], $linha['responsavel'], $linha['cnpj'], $linha['telefone'], $linha['numero'], $linha['cep'], $linha['complemento'], $linha['logradouro'], $linha['cidade'], $linha['estado']);
                $i++;
            }
            return $vet;
        } catch (PDOException $Erro) {
            echo "erro ao buscar dados :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }

    public function newClient($client)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("insert into grts.Empresa  (nome,cnpj,telefone,responsavel)  values (:nome,:cnpj,:tel,:resp)");

            $sql->bindParam("nome", $nome);
            $sql->bindParam("cnpj", $cnpj);
            $sql->bindParam("tel", $tel);
            $sql->bindParam("resp", $resp);

            $nome = $client->getNomeEmpresa();
            $cnpj = $client->getCNPJ();
            $resp = $client->getResponsavel();
            $tel = $client->getTelefone();

            $sql->execute();

            return $sql->rowCount();
        } catch (PDOException $Erro) {
            echo "erro ao add cliente:" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }
}

class enderecoDAO
{

    public function newEndereco($end)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("insert into grts.endereco  (numero,cep,complemento,logradouro,cnpjempresa,idbairro)  values (:numero,:cep,:complemento,:logradouro,:cnpjempresa,:bairro)");

            $sql->bindParam("numero", $numero);
            $sql->bindParam("cep", $cep);
            $sql->bindParam("complemento", $complemento);
            $sql->bindParam("logradouro", $logradouro);
            $sql->bindParam("cnpjempresa", $idCliente);
            $sql->bindParam("bairro", $bairro);
            $idCliente = $end->getIdCliente();
            $bairro = $end->getIdCidade();
            $numero = $end->getNumero();
            $cep = $end->getCEP();
            $complemento = $end->getComplemto();
            $logradouro = $end->getLogradouro();

            $sql->execute();


            return $sql->rowCount();
        } catch (PDOException $Erro) {
            echo "Erro ao cadastar new endereço  :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }


    public function upgradeEndereco($end,$vcnpj)
    {

        try {

            $myconnection = ConnectionFactory::getConnection();

            $sql2= $myconnection->prepare("select id from endereco where cnpjempresa=:cnpjempresa");
            $sql2->bindParam("cnpjempresa", $cnpj);
            $cnpj = $vcnpj;
           
             $sql2->execute();
            
            $sql2->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql2->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['id']);
                $i++;
            }



          $sql = $myconnection->prepare("update  grts.endereco set numero =:numero, cep =:cep , complemento =:complemento, logradouro =:logradouro where id =:id ");

           // $sql->bindParam("cnpjempresa", $cnpj);
            $sql->bindParam("numero", $numero);
            $sql->bindParam("cep", $cep);
            $sql->bindParam("complemento", $comple);
            $sql->bindParam("logradouro", $log);
           /// $sql->bindParam("cidade", $cidade);
            $sql->bindParam("id", $id);
           
            
            $id = $vet[0][0];
            //echo $cnpj = $end->getIdCliente();
            $numero = $end->getNumero();
             $cep= $end->getCEP();
            $comple= $end->getComplemto(); 
            $log = $end->getLogradouro();
           // echo $cidade = $end->getIdCidade();

          $sql->execute();

            

            
        } catch (PDOException $Erro) {
            echo "Erro ao update  :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }

    public  function SelectEndereco($end)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("");

            $sql->bindParam("cnpj", $cnpj);
            $cnpj = $end->idClient();

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['id']);
                $i++;
            }
            return $vet;
        } catch (PDOException $Erro) {
            echo " erro selecionar endereço:" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }
}


class cidadeDAO
{

    public function buscCidade($city)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("select id from grts.cidade where descricao = :descricao");

            $sql->bindParam("descricao", $descricao);
            $descricao = $city->getDescricao();

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['id']);
                $i++;
            }
            if ($vet == NULL)
                return $vet;
            else
                return $vet[0][0];
        } catch (PDOException $Erro) {
            echo "erro ao buscar :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }

    public function newCidade($city)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("insert into grts.cidade  (descricao, idestado)  values (:descricao,:idestado)");

            $sql->bindParam("descricao", $descricao);
            $sql->bindParam("idestado", $idestado);
            $descricao = $city->getDescricao();
            $idestado = $city->getIdEstado();

            $sql->execute();

            if ($sql->rowCount() != 0) {
                $sql2 = $myconnection->prepare("select id from grts.cidade where descricao = :descricao");
                $sql2->bindParam("descricao", $descricao);

                $sql2->execute();

                $sql2->setFetchMode(PDO::FETCH_ASSOC);
                $vet = array();
                $i = 0;

                while ($linha = $sql2->fetch(PDO::FETCH_ASSOC)) {
                    $vet[$i] = array($linha['id']);
                    $i++;
                }
                return $vet[0][0];
            }
        } catch (PDOException $Erro) {
            echo "erro ao add :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }
}

class estadoDAO
{
    public function buscEstado($UF)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("select id from grts.estado where descricao = :descricao");

            $sql->bindParam("descricao", $descricao);
            $descricao = $UF->getDescricao();

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['id']);
                $i++;
            }
            if ($vet == NULL)
                return $vet;
            else
                return $vet[0][0];
        } catch (PDOException $Erro) {
            echo "erro ao buscar :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }

    public function newEstado($UF)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("insert into grts.estado  (descricao)  values (:descricao)");

            $sql->bindParam("descricao", $descricao);
            $descricao = $UF->getDescricao();

            $sql->execute();

            if ($sql->rowCount() != 0) {
                $sql2 = $myconnection->prepare("select id from grts.estado where descricao = :descricao");
                $sql2->bindParam("descricao", $descricao);

                $sql2->execute();

                $sql2->setFetchMode(PDO::FETCH_ASSOC);
                $vet = array();
                $i = 0;

                while ($linha = $sql2->fetch(PDO::FETCH_ASSOC)) {
                    $vet[$i] = array($linha['id']);
                    $i++;
                }
                return $vet[0][0];
            }
        } catch (PDOException $Erro) {
            echo "erro ao add :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }
}


class userDAo
{

    public function checkLogin($user)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("select *from  grts.user where login = :login and senha =:senha ");

            $sql->bindParam("login", $login);
            $sql->bindParam("senha", $senha);
            $senha = $user->getSenha();
            $login = $user->getLogin();

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['login'], $linha['senha']);
                $i++;
            }
            return $vet;
        } catch (PDOException $Erro) {
            echo "check login :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }
}
