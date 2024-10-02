<?php

session_start();
require_once '../connection/connection.php';
extract($_POST);

if($_FILES['fotoperfil']['error'] == UPLOAD_ERR_OK){//Se o upload do input file ocorrer normalmente
                $target_dir = "../uploads/";
                $imageFileType = strtolower(pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION));
    
                // Define o novo nome do arquivo
                $new_file_name = $_SESSION["idusuario"] . ".jpeg";
                $target_file = $target_dir . $new_file_name;
    
                $check = getimagesize($_FILES["fotoperfil"]["tmp_name"]);// Verifica se o arquivo é uma imagem
                if ($check !== false) {
                    if ($_FILES["fotoperfil"]["size"] <= 5000000) { // Verifica o tamanho do arquivo, maqx 5mb
                        if (in_array($imageFileType, ["jpg", "jpeg", "png"])) {// Verifica os tipos de arquivos permitidos
                            if (move_uploaded_file($_FILES["fotoperfil"]["tmp_name"], $target_file)) {// Move o arquivo para o diretório de uploads
                                $stmt->execute();
                                header("Location: ../user/perfil.php");
                                exit();
                            } else { echo "Desculpe, houve um erro ao enviar seu arquivo.";}
                        } else { echo "Desculpe, apenas arquivos JPG, JPEG e PNG são permitidos.";}
                    } else { echo "Desculpe, o arquivo é muito grande.";}
                } else { echo "O arquivo não é uma imagem.";}
            } else{ echo "Erro ao fazer upload da imagem";}
    header("Refresh:2; '../user/perfil")
?>