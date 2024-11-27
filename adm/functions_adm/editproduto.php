<?php
session_start();
require_once '../../connection/connection.php';

if (isset($_GET['id'])) { // Aqui eu pego o Fetch pra usar o select e colocar esses valores no form de edição de produto
    $produto_id = $_GET['id'];

    // Prepara a consulta para obter os detalhes do produto
    $sql = 'SELECT * FROM produto WHERE produto_ID = :produto_ID';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':produto_ID', $produto_id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_OBJ);

        // Agora que temos o produto, também pegamos a categoria
        $fk_categoria_ID = $produto->fk_categoria_ID;  // Agora pega o ID da categoria

        // Consulta para obter os detalhes da categoria
        $sqlSelectcategoria = 'SELECT * FROM categoria WHERE categoria_ID = :categoria_ID';
        $stmtCategoria = $conn->prepare($sqlSelectcategoria);
        $stmtCategoria->bindParam(':categoria_ID', $fk_categoria_ID);
        $stmtCategoria->execute();

        if ($stmtCategoria->rowCount() > 0) {
            $categoria = $stmtCategoria->fetch(PDO::FETCH_OBJ);
            $produto->categoria_nome = $categoria->Nome;
            // Aqui você coloca o nome da categoria no objeto produto
        }

        // Retorna os dados do produto, incluindo o nome da categoria
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

    // Atualização do produto
    $sql = "UPDATE produto 
    SET Preco_Und = :Preco_Und, 
        Qtd_stock = :Qtd_stock, 
        Descricao = :Descricao, 
        Nome_produto = :Nome_produto, 
        fk_categoria_ID = :fk_categoria_ID";

    // Adiciona a imagem só se existir uma imagem
    if (isset($target_file)) {
        $sql .= ", imagem = :imagem";
    }

    $sql .= " WHERE produto_ID = :produto_ID";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':produto_ID', htmlspecialchars($produto_ID)); // Sempre vincule o ID do produto
    $stmt->bindValue(':Preco_Und', htmlspecialchars($Preco_Und));
    $stmt->bindValue(':Qtd_stock', htmlspecialchars($Qtd_stock));
    $stmt->bindValue(':Descricao', htmlspecialchars($Descricao));
    $stmt->bindValue(':Nome_produto', htmlspecialchars($Nome_produto));
    $stmt->bindValue(':fk_categoria_ID', htmlspecialchars($fk_categoria_ID));
    
    if (isset($target_file)) {
        unlink("../../assets/imgs/produtos/".htmlspecialchars($imagem)."");
        $stmt->bindValue(':imagem', $nomearquivo);
    }

    $stmt->execute();
    header("Location: ../produtos.php");
} else {
    echo json_encode(['error' => 'Método de requisição não suportado']);
    $conn = null;
}
?>
