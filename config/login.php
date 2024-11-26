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
                if (password_verify($senha, $usuario->Senha)) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["usuario"] = htmlspecialchars($usuario->Nome);
                    $_SESSION["idusuario"] = $usuario->cliente_ID;
                    if($email == "adm@adm.com"){
                        $_SESSION["adm"] = true;
                        header("Location: ../adm/perfil.php");
                        exit;
                    } else{}
                    header("Location: ../user/perfil.php");
                    exit;
                } else {
                    echo "<script> 
                        alert('Usuário ou senha incorretos');
                        window.location.href = '../login.php'
                    </script>;";  
                }
            }

    $conn = null;
    header("Refresh:5; url='../login.php'");
?>