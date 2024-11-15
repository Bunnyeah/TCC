<?php
session_start();
require_once '../../connection/connection.php';

extract($_POST);
extract($_FILES);

try{
    // Define constantes
    $target_dir = "../assets/imgs/produtos/";
    $file_size_limit = 2000000; // 2 MB
    $allowed_types = ['jpg', 'jpeg', 'png'];
    $errorMsg = "";
    $successMsg = "";

    // Verifica se o arquivo foi enviado
    if (isset($_FILES["newprodutoimg"]) && file_exists($_FILES["newprodutoimg"]['tmp_name'])) {
        $imageFileType = strtolower(pathinfo($_FILES["newprodutoimg"]["name"], PATHINFO_EXTENSION));
        $nomearquivo = uniqid() . "." . $imageFileType;
        $target_file = $target_dir . $nomearquivo;

        // if($target_file){
        //     unlink($target_file);
        // };

        // Verifica o tipo de arquivo
        if (!in_array($imageFileType, $allowed_types)) {
            throw new Exception("Apenas arquivos JPG, JPEG e PNG são permitidos.");
        }

        // Verifica o tamanho do arquivo (max 2mb, limite padrão do php,)
        if ($_FILES["newprodutoimg"]["size"] > $file_size_limit) {
            throw new Exception("A imagem é muito grande.");
        }

        // Verifica se o arquivo é uma imagem (ele )
        if (getimagesize($_FILES["newprodutoimg"]["tmp_name"]) === false) {
            throw new Exception("O arquivo não é uma imagem.");
        }

        // Move o arquivo enviado
        if (!move_uploaded_file($_FILES["newprodutoimg"]["tmp_name"], $target_file)) {
            throw new Exception("Desculpe, houve um erro ao inserir seu arquivo.");
        }
    }

    // Atualiza as informações do usuário
    $sql = "INSERT INTO produto (Preco_Und, Qtd_stock, Descricao, Nome_produto, imagem, fk_categoria_ID) VALUES (:Preco_Und, :Qtd_stock, :Descricao, :Nome_produto, :imagem, :fk_categoria_ID)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':Preco_Und', htmlspecialchars($Preco_Und));
    $stmt->bindValue(':Qtd_stock', htmlspecialchars($Qtd_stock));
    $stmt->bindValue(':Descricao', htmlspecialchars($Descricao));
    $stmt->bindValue(':Nome_produto', htmlspecialchars($Nome_produto));
    $stmt->bindValue(':imagem', $nomearquivo);
    $stmt->bindValue(':fk_categoria_ID', htmlspecialchars($fk_categoria_ID));
    $stmt->execute();

    $successMsg = "Produto Cadastrado com Sucesso";

    if ($successMsg) {
        echo json_encode(['success' => $successMsg]);
        header("Location: ../produtos.php");
    }

} catch (PDOException $e) {
    echo json_encode(['error' => "Erro ao cadastrar o produto: " . $e->getMessage()]);
    header("Location: ../produtos.php");
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    $conn = null;
}
?>