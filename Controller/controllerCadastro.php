<?php
require_once '../Model/class.php';

$client = new cliente($_POST['empresa'], $_POST['resp'], $_POST['cnpj'], $_POST['telefone']);

if ($client->buscClient() == NULL) {

    $client->newClient();
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

    $end = new endereco($_POST['numero'], $_POST['CEP'], $_POST['log'], $_POST['comple'], $idcidade, $_POST['cnpj']);

    if($end->newEndereco()!=null)
        header('location:../view/src/main.php');
    else   
        Echo"erro add endereco";
} else {

    echo "Cliente já possui cadasro";
}
