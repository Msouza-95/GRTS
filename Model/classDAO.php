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



    public function upgradeClient($client, $old)
    {

        try {

            $myconnection = ConnectionFactory::getConnection();

            $sql = $myconnection->prepare("update grts.empresa set cnpj =:cnpj, nome =:nome ,telefone =:tel , responsavel =:resp where cnpj =:old");

            $sql->bindParam("cnpj", $cnpj);
            $sql->bindParam("nome", $nome);
            $sql->bindParam("tel", $tel);
            $sql->bindParam("resp", $resp);
            $sql->bindParam("old", $old);

            $cnpj = $client->getCNPJ();
            $nome = $client->getNomeEmpresa();
            $tel = $client->getTelefone();
            $resp = $client->getResponsavel();
            
            $sql->execute();
            return $sql->rowCount();
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
            from grts.empresa e inner join grts.endereco en on e.cnpj = en.cnpjempresa inner join grts.bairro b
             on b.id = en.idbairro inner join grts.cidade c on c.id = b.idcidade inner join grts.estado uf on c.idestado= uf.id  GROUP BY nome");
            
            
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
            $sql = $myconnection->prepare("select e.nome as empresa, e.responsavel, e.cnpj, e.telefone,en.numero,en.cep,en.complemento,en.logradouro,b.descricao as bairro, c.descricao as cidade , uf.descricao as estado
            from grts.empresa e inner join grts.endereco en on e.cnpj = en.cnpjempresa inner join grts.bairro b
             on b.id = en.idbairro inner join grts.cidade c on c.id = b.idcidade inner join grts.estado uf on c.idestado= uf.id where e.cnpj =:cnpj ");

            $sql->bindParam("cnpj", $cnpj);
            $cnpj = $client->getCNPJ();

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['empresa'], $linha['responsavel'], $linha['cnpj'], $linha['telefone'], $linha['numero'], $linha['cep'], $linha['complemento'], $linha['logradouro'], $linha['bairro'], $linha['cidade'], $linha['estado']);
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
            $bairro = $end->getIdBairro();
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

    public function buscEndereco($end)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("select numero, cep, complemento,logradouro,idbairro from grts.endereco  where cnpjempresa=:cnpj");

            $sql->bindParam("cnpj", $cnpj);
            $cnpj = $end->getIdCliente();

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['numero'],$linha['cep'],$linha['complemento'],$linha['logradouro'],$linha['idbairro']);
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

    public function deleteEndereco($end)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();

            $sql = $myconnection->prepare("delete from grts.endereco where cnpjempresa =:cnpj");

            $sql->bindParam("cnpj", $cnpj);
            $cnpj = $end->getIdCliente();
            echo $cnpj;

            $sql->execute();
            return $sql->rowCount();
        } catch (PDOException $Erro) {
            echo "Erro ao DELETAR  :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }


    public function deleteEndereco2($end)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();

            $sql = $myconnection->prepare("delete from grts.endereco where id =:id");

            $sql->bindParam("id", $id);
            $id= $end->getId();
           

            $sql->execute();
            return $sql->rowCount();
        } catch (PDOException $Erro) {
            echo "Erro ao DELETAR  :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }
    public function upgradeEndereco($end, $vcnpj)
    {

        try {

            $myconnection = ConnectionFactory::getConnection();

            $sql2 = $myconnection->prepare("select id from endereco where cnpjempresa=:cnpjempresa");
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



            $sql = $myconnection->prepare("update  grts.endereco set numero =:numero, cep =:cep , complemento =:complemento, logradouro =:logradouro, idbairro=:bairro where id =:id ");

            // $sql->bindParam("cnpjempresa", $cnpj);
            $sql->bindParam("numero", $numero);
            $sql->bindParam("cep", $cep);
            $sql->bindParam("complemento", $comple);
            $sql->bindParam("logradouro", $log);
            $sql->bindParam("bairro", $bairro);
            $sql->bindParam("id", $id);


            $id = $vet[0][0];
            //echo $cnpj = $end->getIdCliente();
            $numero = $end->getNumero();
            $cep = $end->getCEP();
            $comple = $end->getComplemto();
            $log = $end->getLogradouro();
            $bairro= $end->getIdBairro();

            $sql->execute();
            return $sql->rowCount();
        } catch (PDOException $Erro) {
            echo "Erro ao update  :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }

    

    public  function ClientEndereco($end)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("select e.descricao as estado,ed.id, c.descricao as cidade, b.descricao as bairro, ed.numero,ed.cep,
            ed.logradouro as log, ed.complemento as comple from grts.endereco ed inner join grts.bairro b on ed.idbairro=b.id inner join grts.cidade c on b.idcidade=c.id inner join grts.estado e 
            on c.idestado=e.id where ed.cnpjempresa=:cnpj");

            $sql->bindParam("cnpj", $cnpj);
            $cnpj = $end->getidCliente();

            $sql->execute();

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $vet = array();
            $i = 0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $vet[$i] = array($linha['estado'],$linha['cidade'],$linha['bairro'],$linha['numero'],$linha['cep'],$linha['log'],$linha['comple'],$linha['id']);
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

class bairroDAO
{


    public function newBairro($bairro)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("insert into grts.bairro  (descricao, idcidade)  values (:descricao, :idcidade)");

            $sql->bindParam("descricao", $descricao);
            $sql->bindParam("idcidade", $idcidade);
            $descricao = $bairro->getDescricao();
            $idcidade = $bairro->getIdCidade();

            $sql->execute();

            if ($sql->rowCount() != 0) {
                $sql2 = $myconnection->prepare("select id from grts.bairro where descricao = :descricao");
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
            echo "erro ao add bairro :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }

    public function buscBairro($bairro)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("select id from grts.bairro where descricao = :descricao");

            $sql->bindParam("descricao", $descricao);
            $descricao = $bairro->getDescricao();

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
            echo "erro ao buscar bairro :" . $Erro->getmessage();
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
?>