<?php

require_once '../connection/connection.php';

extract($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);


    if($confirmsenha == $senha){
        $sqlInsert = "INSERT INTO cliente (Email, Senha, Nome) VALUES (:email, :senha, :nome)";
    
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha_hash);

        if ($stmt->execute()) {
            echo "Usuário criado com sucesso";
            header("Location: ../login.php");
        } else {
            echo "Erro: " . $conn->errorInfo();
        }
    }else{
        echo('As senhas não coincidem');
    }
}
$conn = null;

?>
