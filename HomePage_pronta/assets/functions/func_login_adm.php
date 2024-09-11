<?php

require_once '../connect/connection.php';

extract($_POST);

$sqlVerificarLogin = "INSERT INTO usuario_adm VALUES(0,:email_adm,:senha_adm)";

$stmt = $conn->prepare($sqlVerificarLogin);
$stmt->bindValue(':email_adm', $email_adm);
$stmt->bindValue(':senha_adm', $senha_adm);

if($email_adm == 'vitor@gmail.com' && $senha_adm == 123){
    echo('fazendo login'); 
    header("Location: ../index.php");
    exit();
}else{
    echo('email ou senha incorretos');
}

$stmt->execute();
?>
