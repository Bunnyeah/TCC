<?php
session_start();
require_once '../../connection/connection.php';

if (isset($_GET['id'])) { 
    $produto_id = $_GET['id'];

    // Consulta para obter os detalhes do produto
    $sql = 'SELECT * FROM produto WHERE produto_ID = :produto_ID';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':produto_ID', $produto_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $produto = $stmt->fetch(PDO::FETCH_OBJ);

        // Agora que temos o produto, também pegamos a categoria
        $fk_categoria_ID = $produto->fk_categoria_ID; 

        // Consulta para obter os detalhes da categoria
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

    $target_dir_produto = "../../assets/imgs/produtos/";
    $target_dir_tabela = "../../assets/imgs/tabelasnutricionais/";
    $file_size_limit = 2000000; // 2 MB
    $allowed_types = ['jpg', 'jpeg', 'png'];

    $nomearquivo = null;
    $nomearquivo2 = null;

    // Verifica se a imagem do produto foi enviada
    if (isset($_FILES["editprodutoimg"]) && $_FILES["editprodutoimg"]["error"] == 0) {
        $imageFileType = strtolower(pathinfo($_FILES["editprodutoimg"]["name"], PATHINFO_EXTENSION));
        $nomearquivo = uniqid() . "." . $imageFileType;
        $target_file_produto = $target_dir_produto . $nomearquivo;

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

        // Move o arquivo enviado
        if (!move_uploaded_file($_FILES["editprodutoimg"]["tmp_name"], $target_file_produto)) {
            throw new Exception("Desculpe, houve um erro ao inserir seu arquivo.");
        }
    }

    // Verifica se a tabela nutricional foi enviada
    if (isset($_FILES["tabela_nutricional"]) && $_FILES["tabela_nutricional"]["error"] == 0) {
        $imageFileType = strtolower(pathinfo($_FILES["tabela_nutricional"]["name"], PATHINFO_EXTENSION));
        $nomearquivo2 = uniqid() . "." . $imageFileType;
        $target_file_tabela = $target_dir_tabela . $nomearquivo2;

        // Verifica o tipo de arquivo
        if (!in_array($imageFileType, $allowed_types)) {
            throw new Exception("Apenas arquivos JPG, JPEG e PNG são permitidos.");
        }

        // Verifica o tamanho do arquivo
        if ($_FILES["tabela_nutricional"]["size"] > $file_size_limit) {
            throw new Exception("A imagem é muito grande.");
        }

        // Verifica se o arquivo é uma imagem
        if (getimagesize($_FILES["tabela_nutricional"]["tmp_name"]) === false) {
            throw new Exception("O arquivo não é uma imagem.");
        }

        // Move o arquivo enviado
        if (!move_uploaded_file($_FILES["tabela_nutricional"]["tmp_name"], $target_file_tabela)) {
            throw new Exception("Desculpe, houve um erro ao inserir seu arquivo.");
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

    // Adiciona as imagens, se existirem
    if (isset($nomearquivo)) {
        $sql .= ", imagem = :imagem";
    }
    if (isset($nomearquivo2)) {
        $sql .= ", imagem2 = :imagem2";
    }



    $sql .= " WHERE produto_ID = :produto_ID";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':produto_ID', htmlspecialchars($produto_ID));
    $stmt->bindValue(':Preco_Und', htmlspecialchars($Preco_Und));
    $stmt->bindValue(':Qtd_stock', htmlspecialchars($Qtd_stock));
    $stmt->bindValue(':Descricao', htmlspecialchars($Descricao));
    $stmt->bindValue(':Nome_produto', htmlspecialchars($Nome_produto));
    $stmt->bindValue(':fk_categoria_ID', htmlspecialchars($fk_categoria_ID));
    
    // Se uma nova imagem do produto foi enviada, excluir a imagem antiga
    if (isset($nomearquivo)) {
        if (isset($target_file_produto)){
            unlink("../../assets/imgs/produtos/".htmlspecialchars($imagem)."");
        }
        $stmt->bindValue(':imagem', $nomearquivo);
    }

    // Se uma nova tabela nutricional foi enviada, excluir a antiga
    if (isset($nomearquivo2)) {
        if (isset($imagem2)) {
            unlink("../../assets/imgs/tabelasnutricionais/" . htmlspecialchars($imagem2));
        }
        $stmt->bindValue(':imagem2', $nomearquivo2);
    }


    $stmt->execute();
    header("Location: ../produtos.php");
} else {
    echo json_encode(['error' => 'Método de requisição não suportado']);
    $conn = null;
}
?>
