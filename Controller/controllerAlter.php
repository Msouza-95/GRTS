<?php
require_once "../Model/class.php";



$uf = new estado();
$uf->setDescricao($_POST['estado']);



$testEstado = $uf->buscEstado();


if ($testEstado == null) {
    $idEstado = $uf->newEstado();
} else {
    $idEstado = $testEstado;
}
$city = new cidade($_POST['city'], $idEstado);

$testCidade = $city->buscCidade();

if ($testCidade == null) {
    $idCidade = $city->newCidade();
} else {
    $idCidade = $testCidade;
}
$client = new cliente($_POST['nome'], $_POST['resp'], $_POST['cnpj'], $_POST['telefone']);
$end = new endereco($_POST['numero'], $_POST['CEP'], $_POST['log'], $_POST['comple'], $idCidade, $_POST['cnpj']);

if ($end->upgradeEndereco($_POST['velho']) !=null) {
    if ($client->upgradeClient($_POST['velho'] ) != null) {

        header('location:../view/src/main.php');
    }else{
        echo "merda no cliente";
    }
}else {
    echo "merda no endereco";
}
