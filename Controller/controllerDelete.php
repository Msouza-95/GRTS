<?php 
 require_once "../Model//class.php";


$client = new cliente();
$client->setCNPJ($_GET['cnpj']);
if($client->delete()!=null){
    header('location: ../view/src/update.php');
} else{
    echo"erro ao deletar";
}

?>