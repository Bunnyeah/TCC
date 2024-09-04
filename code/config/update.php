<?php
require_once '../connection/connection.php';

extract($_POST);

session_start();
if((!isset ($_SESSION["email"]) == true) and (!isset ($_SESSION["senha"]) == true))
{
    $emailuser = $_SESSION["email"];
    $senhauser = $_SESSION["senha"];
} else{
    header("Location: ../usuario-login.php");
}



$sql = "UPDATE cliente SET Nome=:nome ,Email=:email ,Telefone=:telefone ,Info=:info 
WHERE :email = $emailuser and :senha = $senhauser";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':telefone', $telefone);
$stmt->bindValue(':info', $info);


            //Melhorar nívl de verificação
            $userId = 1;
            // Verifica se um arquivo foi enviado
            if (isset($_FILES['fotoperfil']) && $_FILES['fotoperfil']['error'] == UPLOAD_ERR_OK) {
                $target_dir = "../uploads/";
                $imageFileType = strtolower(pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION));

                // Define o novo nome do arquivo
                $new_file_name = $userId . "." . "jpeg";
                $target_file = $target_dir . $new_file_name;

                // Verifica se o arquivo é uma imagem
                $check = getimagesize($_FILES["fotoperfil"]["tmp_name"]);
                if ($check === false) {
                    echo("O arquivo não é uma imagem.");
                } else {
                    // Verifica o tamanho do arquivo
                    if ($_FILES["fotoperfil"]["size"] > 50000000) { // 500KB
                        echo("Desculpe, o arquivo é muito grande.");
                    } else {
                        // Verifica os tipos de arquivos permitidos
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                            echo("Desculpe, apenas arquivos JPG, JPEG e PNG são permitidos.");
                        } else {
                            // Move o arquivo para o diretório de uploads
                            if (move_uploaded_file($_FILES["fotoperfil"]["tmp_name"], $target_file)) {
                                echo("O arquivo ". htmlspecialchars($new_file_name) . " foi enviado com sucesso.");
                                $stmt->execute();
                                $conn = null;
                                header("Location: ../config-usuario.php");

                            } else {
                                echo("Desculpe, houve um erro ao enviar seu arquivo.");
                            }
                        }
                    }
                }
            }else{echo("O arquivo é muito grande");}


?>