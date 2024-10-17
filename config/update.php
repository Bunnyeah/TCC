<?php
session_start();
require_once '../connection/connection.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['loggedin'])) {
    die(json_encode(['error' => 'Usuário não encontrado.']));
}

extract($_POST);

try{
    // Define constantes
    $target_dir = "../uploads/";
    $file_size_limit = 2000000; // 2 MB
    $allowed_types = ['jpg', 'jpeg', 'png'];
    $errorMsg = "";
    $successMsg = "";

    // Verifica se o arquivo foi enviado
    if (isset($_FILES["fotoperfil"]) && file_exists($_FILES["fotoperfil"]['tmp_name'])) {
        $imageFileType = strtolower(pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION));
        $target_file = $target_dir . $_SESSION["idusuario"] . ".jpeg"; // Nome usando ID pra diferenciar

        // Verifica o tipo de arquivo
        if (!in_array($imageFileType, $allowed_types)) {
            throw new Exception("Apenas arquivos JPG, JPEG e PNG são permitidos.");
        }

        // Verifica o tamanho do arquivo (max 2mb, limite padrão do php,)
        if ($_FILES["fotoperfil"]["size"] > $file_size_limit) {
            throw new Exception("A imagem é muito grande.");
        }

        // Verifica se o arquivo é uma imagem (ele )
        if (getimagesize($_FILES["fotoperfil"]["tmp_name"]) === false) {
            throw new Exception("O arquivo não é uma imagem.");
        }

        // Move o arquivo enviado
        if (!move_uploaded_file($_FILES["fotoperfil"]["tmp_name"], $target_file)) {
            throw new Exception("Desculpe, houve um erro ao inserir seu arquivo.");
        }
    }

    // Atualiza as informações do usuário
    $sql = "UPDATE cliente SET Nome=:nome, Email=:email, Telefone=:telefone, Info=:info WHERE cliente_ID=:cliente_ID";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':cliente_ID', $_SESSION['idusuario']);
    $stmt->bindValue(':nome', htmlspecialchars($nome));
    $stmt->bindValue(':email', htmlspecialchars($email));
    $stmt->bindValue(':telefone', htmlspecialchars($telefone));
    $stmt->bindValue(':info', htmlspecialchars($info));
    $stmt->execute();

    $successMsg = "Perfil Atualizado";

    if ($successMsg) {
        echo json_encode(['success' => $successMsg]);
    }

} catch (PDOException $e) {
    echo json_encode(['error' => "Erro ao atualizar o perfil: " . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    $conn = null;
}
?>