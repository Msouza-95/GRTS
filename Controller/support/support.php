<?php
require_once "../../Model/class.php";

function genericTable($tipo)
{
    $client = new cliente();

    $table = new generic();
    $table->GerarTable($client->ClietAll(),$tipo);
}


function busca($cnpj){
    $client = new cliente("","",$cnpj); 
    

    return $client->DadosClient();   


}