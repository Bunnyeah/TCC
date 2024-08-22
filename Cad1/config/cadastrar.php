<?php

require_once '../connection/connection.php';

extract($_POST);

// // Validação Celular
// function celular($telefone){
//     $telefone = trim(str_replace('/', '', str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $telefone))))));

//     $regexCel = '/[0-9]{2}[6789][0-9]{3,4}[0-9]{4}/';
//     if (preg_match($regexCel, $telefone)) {
//         return true;
//     }else{
//         return false;

//     }
// }

if($confirmsenha == $senha){
    $sqlInsertUsuario = "INSERT INTO cliente VALUES(0,:email,:senha,:nome,0,0,0)";

    $stmt = $conn->prepare($sqlInsertUsuario);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':email', $email);
    // $stmt->bindValue(':telefone', $telefone);
    $stmt->bindValue(':senha', $senha);
    $stmt->execute();
    ?>
    <script>alert('Usuário cadastrado com sucesso')</script>
    <meta http-equiv="refresh" content="0; url=../usuario-cadastro.php">
    <?php
}else{
        ?>
        <script>alert('As senhas não coincidem')</script>
        <meta http-equiv="refresh" content="0; url=../usuario-cadastro.php">
    <?php
}
    ?>