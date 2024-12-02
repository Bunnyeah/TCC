<?php
session_start();
require_once '../../connection/connection.php';

extract($_POST);
extract($_FILES);

try {
    // Define constantes
    $file_size_limit = 2000000; // 2 MB
    $allowed_types = ['jpg', 'jpeg', 'png'];
    $errorMsg = "";
    $successMsg = "";
    
    // Verifica se o arquivo foi enviado
    if (isset($_FILES["newprodutoimg"]) && file_exists($_FILES["newprodutoimg"]['tmp_name'])) {
        $target_dir = "../../assets/imgs/produtos/";
        $imageFileType = strtolower(pathinfo($_FILES["newprodutoimg"]["name"], PATHINFO_EXTENSION));
        $nomearquivo = uniqid() . "." . $imageFileType;
        $target_file = $target_dir . $nomearquivo;

        // Validações do arquivo
        if (!in_array($imageFileType, $allowed_types)) {
            throw new Exception("Apenas arquivos JPG, JPEG e PNG são permitidos.");
        }

        if ($_FILES["newprodutoimg"]["size"] > $file_size_limit) {
            throw new Exception("A imagem é muito grande.");
        }

        if (getimagesize($_FILES["newprodutoimg"]["tmp_name"]) === false) {
            throw new Exception("O arquivo enviado não é uma imagem válida.");
        }

        // Move o arquivo
        if (!move_uploaded_file($_FILES["newprodutoimg"]["tmp_name"], $target_file)) {
            throw new Exception("Erro ao salvar o arquivo enviado.");
        }
    } else {
        throw new Exception("Nenhum arquivo foi enviado.");
    }
    if (isset($_FILES["tabela_nutricional"]) && file_exists($_FILES["tabela_nutricional"]['tmp_name'])) {
        $target_dir = "../../assets/imgs/tabelasnutricionais/";
        $imageFileType = strtolower(pathinfo($_FILES["tabela_nutricional"]["name"], PATHINFO_EXTENSION));
        $nomearquivo2 = uniqid() . "." . $imageFileType;
        $target_file = $target_dir . $nomearquivo2;

        // Verifica o tipo de arquivo
        if (!in_array($imageFileType, $allowed_types)) {
            throw new Exception("Apenas arquivos JPG, JPEG e PNG são permitidos.");
        }

        // Verifica o tamanho do arquivo (max 2mb, limite padrão do php,)
        if ($_FILES["tabela_nutricional"]["size"] > $file_size_limit) {
            throw new Exception("A imagem é muito grande.");
        }

        // Verifica se o arquivo é uma imagem (ele )
        if (getimagesize($_FILES["tabela_nutricional"]["tmp_name"]) === false) {
            throw new Exception("O arquivo não é uma imagem.");
        }

        // Move o arquivo enviado
        if (!move_uploaded_file($_FILES["tabela_nutricional"]["tmp_name"], $target_file)) {
            throw new Exception("Desculpe, houve um erro ao inserir seu arquivo.");
        }
    }

    // Atualiza as informações do usuário
    $sql = "INSERT INTO produto (Preco_Und, Qtd_stock, Descricao, Nome_produto, imagem, imagem2, fk_categoria_ID) VALUES (:Preco_Und, :Qtd_stock, :Descricao, :Nome_produto, :imagem, :imagem2, :fk_categoria_ID)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':Preco_Und', $Preco_Und);
    $stmt->bindValue(':Qtd_stock', (int)$Qtd_stock, PDO::PARAM_INT);
    $stmt->bindValue(':Descricao', htmlspecialchars($Descricao));
    $stmt->bindValue(':Nome_produto', htmlspecialchars($Nome_produto));
    $stmt->bindValue(':imagem', $nomearquivo);
    $stmt->bindValue(':imagem2', $nomearquivo2);
    $stmt->bindValue(':fk_categoria_ID', htmlspecialchars($fk_categoria_ID));
    $stmt->execute();

    // Redireciona para a página de produtos
    header("Location: ../produtos.php");
} catch (PDOException $e) {
    echo json_encode(['error' => "Erro no banco de dados: " . $e->getMessage()]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    // Fecha a conexão
    $conn = null;
}
?>
