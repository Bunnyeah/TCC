<?php
session_start();
require_once '../connection/connection.php';

if (isset($_SESSION['loggedin'])) {
    extract($_POST);

    try {
        $sql = "UPDATE cliente SET Nome=:nome, Email=:email, Telefone=:telefone, Info=:info WHERE ID_cliente=:ID_cliente";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':ID_cliente', $_SESSION['idusuario']);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':telefone', $telefone);
        $stmt->bindValue(':info', $info);
        
        $upload_success = true; // Flag para indicar se o upload foi bem-sucedido

        if (isset($_FILES['fotoperfil'])) {
            if ($_FILES['fotoperfil']['error'] == UPLOAD_ERR_OK) {
                $target_dir = "../uploads/";
                $imageFileType = strtolower(pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION));
                $new_file_name = $_SESSION["idusuario"] . ".jpeg";
                $target_file = $target_dir . $new_file_name;

                $check = getimagesize($_FILES["fotoperfil"]["tmp_name"]);
                if ($check !== false) {
                    if ($_FILES["fotoperfil"]["size"] <= 5000000) {
                        if (in_array($imageFileType, ["jpg", "jpeg", "png"])) {
                            if (!move_uploaded_file($_FILES["fotoperfil"]["tmp_name"], $target_file)) {
                                echo "Desculpe, houve um erro ao enviar seu arquivo.";
                                $upload_success = false;
                            }
                        } else {
                            echo "Desculpe, apenas arquivos JPG, JPEG e PNG são permitidos.";
                            $upload_success = false;
                        }
                    } else {
                        echo "Desculpe, o arquivo é muito grande.";
                        $upload_success = false;
                    }
                } else {
                    echo "O arquivo não é uma imagem.";
                    $upload_success = false;
                }
            }
        }

        if ($upload_success){
            $stmt->execute();
            header("Location: ../user/perfil.php");
            exit();
        } else {
            header("Refresh: 5; url=../user/perfil.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro ao atualizar o perfil: " . $e->getMessage();
    }
} else {
    die('Usuário não encontrado.');
};
$conn = null;
?>
