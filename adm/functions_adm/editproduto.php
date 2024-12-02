<?php
session_start();
require_once '../../connection/connection.php';

if (isset($_GET['id'])) { // Pega os dados para edição
    $produto_id = $_GET['id'];

    // Consulta para obter os detalhes do produto
    $sql = 'SELECT * FROM produto WHERE produto_ID = :produto_ID';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':produto_ID', $produto_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_OBJ);

        // Obtém os detalhes da categoria
        $fk_categoria_ID = $produto->fk_categoria_ID;
        $sqlSelectcategoria = 'SELECT * FROM categoria WHERE categoria_ID = :categoria_ID';
        $stmtCategoria = $conn->prepare($sqlSelectcategoria);
        $stmtCategoria->bindParam(':categoria_ID', $fk_categoria_ID, PDO::PARAM_INT);
        $stmtCategoria->execute();

        if ($stmtCategoria->rowCount() > 0) {
            $categoria = $stmtCategoria->fetch(PDO::FETCH_OBJ);
            $produto->categoria_nome = $categoria->Nome;
        }

        // Retorna os dados do produto com o nome da categoria
        echo json_encode($produto);
    } else {
        echo json_encode(['error' => 'Produto não encontrado']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);
    extract($_FILES);

    $target_dir = "../../assets/imgs/produtos/";
    $file_size_limit = 2000000; // 2 MB
    $allowed_types = ['jpg', 'jpeg', 'png'];
    $target_file = null;

    if (isset($_FILES["editprodutoimg"]) && $_FILES["editprodutoimg"]["error"] == 0) {
        $imageFileType = strtolower(pathinfo($_FILES["editprodutoimg"]["name"], PATHINFO_EXTENSION));
        $nomearquivo = uniqid() . "." . $imageFileType;
        $target_file = $target_dir . $nomearquivo;

        // Validações de imagem
        if (!in_array($imageFileType, $allowed_types)) {
            throw new Exception("Apenas arquivos JPG, JPEG e PNG são permitidos.");
        }
        if ($_FILES["editprodutoimg"]["size"] > $file_size_limit) {
            throw new Exception("A imagem é muito grande.");
        }
        if (getimagesize($_FILES["editprodutoimg"]["tmp_name"]) === false) {
            throw new Exception("O arquivo não é uma imagem.");
        }

        // Move o arquivo
        if (!move_uploaded_file($_FILES["editprodutoimg"]["tmp_name"], $target_file)) {
            throw new Exception("Erro ao inserir o arquivo.");
        }
    }

    // Converte preço para o formato correto
    $Preco_Und = floatval(str_replace(',', '.', str_replace('.', '', $Preco_Und)));

    
    // Atualização do produto
    $sql = "UPDATE produto 
            SET Preco_Und = :Preco_Und, 
                Qtd_stock = :Qtd_stock, 
                Descricao = :Descricao, 
                Nome_produto = :Nome_produto, 
                fk_categoria_ID = :fk_categoria_ID";

    if (isset($target_file)) {
        $sql .= ", imagem = :imagem";
    }

    $sql .= " WHERE produto_ID = :produto_ID";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':produto_ID', $produto_ID, PDO::PARAM_INT);
    $stmt->bindValue(':Preco_Und', $Preco_Und);
    $stmt->bindValue(':Qtd_stock', (int)$Qtd_stock, PDO::PARAM_INT);
    $stmt->bindValue(':Descricao', htmlspecialchars($Descricao));
    $stmt->bindValue(':Nome_produto', htmlspecialchars($Nome_produto));
    $stmt->bindValue(':fk_categoria_ID', (int)$fk_categoria_ID, PDO::PARAM_INT);

    if (isset($target_file)) {
        unlink("../../assets/imgs/produtos/" . htmlspecialchars($imagem));
        $stmt->bindValue(':imagem', $nomearquivo);
    }

    $stmt->execute();
    header("Location: ../produtos.php");
} else {
    echo json_encode(['error' => 'Método de requisição não suportado']);
    $conn = null;
}
?>
