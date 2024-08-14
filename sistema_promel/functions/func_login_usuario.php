<?php
require_once '../connect/connection.php';


if (isset($_POST['email_usuario']) && isset($_POST['senha_usuario'])) {
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];

    $stmt = $conn->prepare('SELECT senha_usuario FROM usuario WHERE email_usuario = :email_usuario');
    $stmt->bindParam(':email_usuario', $email_usuario);
    $stmt->execute();

    
    if ($stmt->rowCount() > 0) {
        $resultado = $stmt->fetch();
        $senha_usuario_bd = $resultado['senha_usuario'];

        
        if ($senha_usuario == $senha_usuario_bd) {
            
            header('Location: ../index.php');
            exit();
        } else {
            
            $erro = 'Senha incorreta!';
            header('Location: ../login2.php');
        }
    } else {
        
        $erro = 'Email não cadastrado!';
        header('Location: ../login2.php');
    }
}
?>