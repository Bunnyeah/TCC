<?php
    require_once '../connection/connection.php';

    extract($_POST);

    $sql = "SELECT * FROM cliente WHERE email = :email";
    //Perdi a merda da function
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $usuario = $stmt->fetch(PDO::FETCH_OBJ);

                // if($usuario->senha = "123" && $usuario->email = "adm@adm.com"){
                //     $_SESSION["loggedin"] = true;
                //     header("Location: ../adm/produtos.php");
                // }
                if (password_verify($senha, $usuario->Senha)) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["usuario"] = htmlspecialchars($usuario->Nome);
                    $_SESSION["idusuario"] = $usuario->cliente_ID;
                    // Redireciona para o perfil do usuário
                    header("Location: ../user/perfil.php");
                    exit;
                } else {
                    echo "Usuário ou senha incorretos.";
                }
            }

    $conn = null;
    header("Refresh:5; url='../login.php'");
?>