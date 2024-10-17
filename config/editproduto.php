<?php
session_start();
require_once '../connection/connection.php';

if (isset($_GET['id'])) { //Aqui eu pego o Fetch pra usar o select e colocar esses valores no formeditproduto
    $produto_id = $_GET['id'];

    // Prepara a consulta para obter os detalhes do produto
    $sql = 'SELECT * FROM produto WHERE produto_ID = :produto_ID';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':produto_ID', $produto_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_OBJ);
        // Retorna os dados do produto em formato JSON
        echo json_encode($produto);
    } else {
        echo json_encode(['error' => 'Produto não encontrado']);
    }




} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    extract($_FILES);

    try {
        $target_dir = "../assets/imgs/produtos/";
        $file_size_limit = 2000000; // 2 MB
        $allowed_types = ['jpg', 'jpeg', 'png'];
        $target_file = null;

        if (isset($_FILES["editprodutoimg"]) && $_FILES["editprodutoimg"]["error"] == 0) {
            $imageFileType = strtolower(pathinfo($_FILES["editprodutoimg"]["name"], PATHINFO_EXTENSION));
            $target_file = $target_dir . uniqid() . "." . $imageFileType;

            // Verifica o tipo de arquivo
            if (!in_array($imageFileType, $allowed_types)) {
                throw new Exception("Apenas arquivos JPG, JPEG e PNG são permitidos.");
            }

            // Verifica o tamanho do arquivo
            if ($_FILES["editprodutoimg"]["size"] > $file_size_limit) {
                throw new Exception("A imagem é muito grande.");
            }

            // Verifica se o arquivo é uma imagem
            if (getimagesize($_FILES["editprodutoimg"]["tmp_name"]) === false) {
                throw new Exception("O arquivo não é uma imagem.");
            }

            // Move o arquivo enviado
            if (!move_uploaded_file($_FILES["editprodutoimg"]["tmp_name"], $target_file)) {
                throw new Exception("Desculpe, houve um erro ao inserir seu arquivo.");
            }
        }

        $sql = "UPDATE produto SET Preco_Und = :Preco_Und, Qtd_stock = :Qtd_stock, Descricao = :Descricao, Nome_produto = :Nome_produto" . (isset($target_file) ? ", imagem = :imagem" : "") . " WHERE produto_ID = :produto_ID";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':Preco_Und', htmlspecialchars($Preco_Und));
        $stmt->bindValue(':Qtd_stock', htmlspecialchars($Qtd_stock));
        $stmt->bindValue(':Descricao', htmlspecialchars($Descricao));
        $stmt->bindValue(':Nome_produto', htmlspecialchars($Nome_produto));
        
        if (isset($target_file)) {
            $stmt->bindValue(':imagem', $target_file);
        }
        $stmt->bindValue(':produto_ID', htmlspecialchars($produto_ID)); // Sempre vincule o ID do produto
        // var_dump($produto_ID, $Preco_Und, $Qtd_stock, $Descricao, $Nome_produto);
        $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => "Produto atualizado com sucesso"]);
    } else {
        echo json_encode(['error' => "Nenhuma alteracao feita"]);
    }

    } catch (PDOException $e) {
        echo json_encode(['error' => "Erro ao atualizar o produto: " . $e->getMessage()]);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    } finally {
        $conn = null;
    }
} else {
    echo json_encode(['error' => 'Método de requisição não suportado']);
    $conn = null;
}
?>
