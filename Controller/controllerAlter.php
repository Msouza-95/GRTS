<?php
require_once "../Model/class.php";


$acao = $_POST['acao'];

if($acao == "AlterarCliente" ){

        $CNPJAtual = $_POST["idClient"];

        $client = new cliente($_POST['empresa'], $_POST['resp'], $_POST['cnpj'], $_POST['telefone']);

        if($client->upgradeClient($CNPJAtual)!= null){

            header('location:../view/src/modify.php');

        }else{

            echo " deu merda atulizar cliente"; 

        }

}

if($acao == "AlterarEndereco"){
    // estado 
    $uf = new estado();
        $uf->setDescricao($_POST['estado']);



        $testEstado = $uf->buscEstado();


        if ($testEstado == null) {
            $idEstado = $uf->newEstado();
        } else {
            $idEstado = $testEstado;
        }
//cidade 
    $city = new cidade($_POST['city'], $idEstado);

    $testCidade = $city->buscCidade();

    if ($testCidade == null) {
        $idCidade = $city->newCidade();
    } else {
        $idCidade = $testCidade;
    }

    //bairro 

    $bairro = new bairro(); 
    $bairro->setDescricao( $_POST['bairro']);

    $testbairro = $city->buscBairro();

    if ($$testbairro == null) {
        $idBairro = $city->newBairro();
    } else {
        $idBairro = $testbairro;
    }

    $end = new endereco($_POST['numero'], $_POST['CEP'], $_POST['log'], $_POST['comple'], $idBairro,null);

    
    if ($end->upgradeEndereco($_POST['idEnd']) !=null) {
    
        header('location:../view/src/modify.php');

    }else {
            echo "merda no endereco";
    }

}
$acaoGet = $_GET['acao'];


if($acaoGet=="deleteEnd"){

    echo $_GET['acao'];

}





/*





*/