<?php
require_once "../Model/class.php";



session_start();
if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];

    if ($acao == "AlterarCliente") {

        $CNPJAtual = $_POST["idClient"];

        $client = new cliente($_POST['empresa'], $_POST['resp'], $_POST['cnpj'], $_POST['telefone']);

        if ($CNPJAtual != $_POST['cnpj']) {
            // deleta endereco referente ao cnpj e cria um novo 
            $end = new endereco();

            $end->seIdCliente($CNPJAtual);
            $vet = $end->buscEndereco();

            $end->setNumero($vet[0][0]);
            $end->setCEP($vet[0][1]);
            $end->setLogradouro($vet[0][3]);
            $end->setComplemto($vet[0][2]);
            $end->setBairro($vet[0][4]);




            if ($end->deleteEndereco() != null) {
                if ($client->upgradeClient($CNPJAtual) != null) {
                    $end->seIdCliente($_POST['cnpj']);
                    $_SESSION['CNPJ'] = $end->getIdCliente();
                    if ($end->newEndereco() != null) {
                        $_SESSION['status'] = 1;
                        header('location:../view/src/modify.php');
                    }
                }
            }
        } else {
            if ($client->upgradeClient($CNPJAtual) != null) {
                header('location:../view/src/modify.php');
               $_SESSION['status'] = 1;
            }
            header('location:../view/src/modify.php');
        }
    }



        if($acao == "novo"){
            $UF = new estado();
            $city = new cidade();
        
            $UF->setDescricao($_POST['estado']);
        
            $idEstado = $UF->buscEstado();
            if ($idEstado == NULL) { // estado não possui cadastro
        
                $idEstado = $UF->newEstado(); // cria um novo 
            }
        
            $city->seTIdEstado($idEstado);
            $city->setDescricao($_POST['city']);
        
            $idcidade = $city->buscCidade();
            if ($idcidade == NULL) { // não possui cidade cadastrada 
                $idcidade = $city->newCidade();
            }
            $bairro = new bairro(); 
            $bairro->setIdCidade($idcidade);
            $bairro->setDescricao($_POST['bairro']);  
        
            $idbairro = $bairro->buscBairro();
            if ($idbairro == NULL) { // não possui cidade cadastrada 
                $idbairro = $bairro->newbairro();
            }
        
        
            $end = new endereco($_POST['numero'], $_POST['CEP'], $_POST['log'], $_POST['comple'], $idbairro, $_POST['cnpj']);
        
            if($end->newEndereco()!=null)
                header('location:../view/src/main.php');
            else   
                Echo"erro add endereco";

 }
     


}


if(isset($_GET['acao'])){
    $acaoGet = $_GET['acao'];

    if ($acaoGet == "deleteEnd") {
              $end= new endereco();
              $end->setId($_GET['id']);
              if($end->deleteEndereco2()!=null)
                    header('location:../view/src/main.php');
}

}
