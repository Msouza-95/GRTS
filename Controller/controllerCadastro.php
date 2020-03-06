<?php
require_once '../Model/class.php';


$UF = new estado();
$city = new cidade();



//$UF->setDescricao($_POST['estado']) ;

$UF->setDescricao("bh"); // apagar 
    $idEstado = $UF->buscEstado(); 
if ($idEstado== NULL) { // estado não possui cadastro
    
    $idEstado= $UF->newEstado(); // cria um novo 
 }

     $city->seTIdEstado($idEstado);
     //$city->setDescricao($_POST['cidade']);
     $city->setDescricao("rio de janeiro"); /// apagar 
 
     $idcidade= $city->buscCidade(); 
      if($idcidade == NULL){
         $idcidade = $city-> newCidade(); 
      }

      $end = new endereco($_POST['numero'],$_POST['cep'],$_POST['log'],$_POST['comple'],$idcidade, $_POST['cnpj']);
      
      $end->newEndereco(); 

// fazer cliente 
  
   

  

    

 



//$UF->newEstado(); 

//$end = new endereco($_POST['empresa'], $_POST['resp'], $_POST['telefone'], $_POST['cnpj'], $_POST['log'], $_POST['comple'], $city->getId(),$estado->getId(), $_POST['CEP']);

// add um novo endereço

/*if ($end->newEndereco() != 0)
    echo "ADD";
else
    echo "erro ADD";
*/
