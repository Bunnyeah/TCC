<?php
require_once '../connect/connection.php';


if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare('SELECT senha FROM cliente WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    
    if ($stmt->rowCount() > 0) {
        $resultado = $stmt->fetch();
        $senha_bd = $resultado['senha'];

        
        if ($senha == $senha_bd) {
            
            header('Location: ../../../../homepage.php');
            exit();
        } else {
            
            $erro = 'Senha incorreta!';
            header('Location: ../../../../login.php');
        }
    } else {
        
        $erro = 'Email não cadastrado!';
        header('Location: ../../../../login.php');
    }
}
?>