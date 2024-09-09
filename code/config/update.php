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

        // Verifica se o arquivo foi enviado
        if (isset($_FILES['fotoperfil']) && $_FILES['fotoperfil']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "../uploads/";
            $imageFileType = strtolower(pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION));

            // Define o novo nome do arquivo
            $new_file_name = $_SESSION["idusuario"] . ".jpeg";
            $target_file = $target_dir . $new_file_name;

            // Verifica se o arquivo é uma imagem
            $check = getimagesize($_FILES["fotoperfil"]["tmp_name"]);
            if ($check !== false) {
                // Verifica o tamanho do arquivo
                if ($_FILES["fotoperfil"]["size"] <= 5000000) { // 5MB
                    // Verifica os tipos de arquivos permitidos
                    if (in_array($imageFileType, ["jpg", "jpeg", "png"])) {
                        // Remove a imagem antiga, se existir
                        $old_file = glob($target_dir . $_SESSION["id_cliente"] . ".*");
                        if (is_array($old_file) && count($old_file) > 0) {
                            unlink($old_file[0]);
                        }

                        // Move o arquivo para o diretório de uploads
                        if (move_uploaded_file($_FILES["fotoperfil"]["tmp_name"], $target_file)) {
                            // Atualiza a informação da imagem no banco de dados
                            $stmt->execute();
                            $conn = null;
                            header("Location: ../usuario-perfil.php");
                            exit();
                        } else {
                            echo "Desculpe, houve um erro ao enviar seu arquivo.";
                        }
                    } else {
                        echo "Desculpe, apenas arquivos JPG, JPEG e PNG são permitidos.";
                    }
                } else {
                    echo "Desculpe, o arquivo é muito grande.";
                }
            } else {
                echo "O arquivo não é uma imagem.";
            }
        } else {
            // Atualiza os dados do usuário mesmo sem alterar a imagem
            $stmt->execute();
            $conn = null;
            header("Location: ../usuario-perfil.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro ao atualizar o perfil: " . $e->getMessage();
    }
} else {
    die('Usuário não encontrado.');
}
?>
