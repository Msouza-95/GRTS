<?php
require_once "connectionFactory.php";

class clientDAO
{
}

class enderecoDAO
{
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
