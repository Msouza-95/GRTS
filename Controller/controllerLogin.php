<?php
require_once "../Model/class.php";

$user = new user($_POST['login'], $_POST['senha']);
$response = $user->checkLogin();

if ($response != null)
    header('location:../VieW/src/main.php');
else
    // criar um alerta de senha invalida 
    echo "senha errada";
