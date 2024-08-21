<?php
include 'config.php'; // Inclui o arquivo de conexão com o banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $info = $_POST['info'];
    $senha = $_POST['senha'];

    // Validação básica
    if (!empty($nome) && !empty($email)) {
        try {
            // Prepara e vincula a consulta
            $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, telefone, info, senha) VALUES (:nome, :email, :telefone, :info, :senha)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':info', $info);
            $stmt->bindParam(':senha', $senha);

            // Executa a consulta
            $stmt->execute();

            // Obtém o ID do usuário inserido
            $userId = $conn->lastInsertId();
            echo "Novo registro criado com sucesso! ID do usuário: " . $userId;

            // Verifica se um arquivo foi enviado
            if (isset($_FILES['fotoperfil']) && $_FILES['fotoperfil']['error'] == UPLOAD_ERR_OK) {
                $target_dir = "uploads/";
                $imageFileType = strtolower(pathinfo($_FILES["fotoperfil"]["name"], PATHINFO_EXTENSION));

                // Define o novo nome do arquivo
                $new_file_name = $userId . "." . "jpeg";
                $target_file = $target_dir . $new_file_name;

                // Verifica se o arquivo é uma imagem
                $check = getimagesize($_FILES["fotoperfil"]["tmp_name"]);
                if ($check === false) {
                    echo "O arquivo não é uma imagem.";
                } else {
                    // Verifica o tamanho do arquivo
                    if ($_FILES["fotoperfil"]["size"] > 500000) { // 500KB
                        echo "Desculpe, o arquivo é muito grande.";
                    } else {
                        // Verifica os tipos de arquivos permitidos
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                            echo "Desculpe, apenas arquivos JPG, JPEG e PNG são permitidos.";
                        } else {
                            // Move o arquivo para o diretório de uploads (sobrescrevendo se já existir)
                            if (move_uploaded_file($_FILES["fotoperfil"]["tmp_name"], $target_file)) {
                                echo "O arquivo ". htmlspecialchars($new_file_name) . " foi enviado e sobrescrito com sucesso.";
                            } else {
                                echo "Desculpe, houve um erro ao enviar seu arquivo.";
                            }
                        }
                    }
                }
            } else {
                echo "Nenhum arquivo enviado ou ocorreu um erro no upload.";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        echo "Nome e email são obrigatórios!";
    }
}

// Fecha a conexão
$conn = null;
?>