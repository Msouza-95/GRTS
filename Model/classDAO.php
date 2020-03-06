<?php
require_once "connectionFactory.php";

class clientDAO
{
}

class enderecoDAO
{

    public function newEndereco($end)
    {
        try {

            $myconnection = ConnectionFactory::getConnection();
            $sql = $myconnection->prepare("insert into grts.endereco  (numero,cep,complemento,logradouro,cnpjempresa,idcidade)  values (:numero,:cep,:complemento,:logradouro,:cnpjempresa,:idcidade)");

            $sql->bindParam("numero", $numero);
            $sql->bindParam("cep", $cep);
            $sql->bindParam("complemento", $complemento;
            $sql->bindParam("logradouro", $logradouro);
            $sql->bindParam("cnpjempresa", $idCliente);
            $sql->bindParam("idcidade", $idcidade);


            $sql->execute();


            return $sql->rowCount();
        } catch (PDOException $Erro) {
            echo "Erro ao cadastar new endereço  :" . $Erro->getmessage();
            return;
        }
        $Minhaconexao = NULL;

        return;
    }
}


class cidadeDAO{

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
            if($vet==NULL)
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
            if($vet==NULL)
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
