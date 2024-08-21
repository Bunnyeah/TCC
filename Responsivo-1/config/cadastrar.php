<?php

require_once '../connection/connection.php';

extract($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_usuario = $_POST['nome'];
    $email_usuario = $_POST['email'];
    // $telefone_usuario = $_POST['telefone'];
    $senha_usuario = $_POST['senha'];
}

// Validação Celular
// function celular($telefone_usuario){
//     $telefone_usuario = trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone_usuario))))));

//     $regexCel = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/';
//     if (preg_match($regexCel, $telefone_usuario)) {
//         return true;
//     }else{
//         return false;
//     }
// }

$sqlInsertUsuario = "INSERT INTO cliente VALUES(0,:email,:senha,:nome,0,0)";

$stmt = $conn->prepare($sqlInsertUsuario);
$stmt->bindValue(':nome', $nome_usuario);
$stmt->bindValue(':email', $email_usuario);
// $stmt->bindValue(':telefone_usuario', $telefone_usuario);
$stmt->bindValue(':senha', $senha_usuario);
$stmt->execute();
?>
<script>alert('Usuário cadastrado com sucesso')</script>
<meta http-equiv="refresh" content="0; url=../usuario-cadastro.php">