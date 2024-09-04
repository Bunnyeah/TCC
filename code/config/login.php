<?php
require_once '../connection/connection.php';

extract($_POST);

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
            header("Location: ../config-usuario.php");
            
            //Iniciar sessão
            session_start();
            $_SESSION["email"]=$email;
            $_SESSION["senha"]=$senha;
            //echo $_SESSION["email"];
            //echo $_SESSION["senha"];

            exit();
        } else {?><script>alert('Senha incorreta !')</script> <meta http-equiv="refresh" content="0; url=../usuario-login.php"><?php }
    } else {?><script>alert('Email não cadastrado !')</script> <meta http-equiv="refresh" content="0; url=../usuario-login.php"><?php }
}
?>