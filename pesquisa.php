<?php
require_once './connection/connection.php';


$query = $_GET['query'] ?? '';

if (!empty($query)) {
    
    $stmt = $conn->prepare("SELECT produto_ID FROM produto WHERE Nome_produto LIKE :query LIMIT 1");
    $stmt->bindValue(':query', '%' . $query . '%');
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_OBJ);

    if ($produto) {
        
        header("Location: info_produto.php?id=" . $produto->produto_ID);
        exit;
    } else {
        
        echo "Nenhum produto encontrado com o termo '$query'.";
    }
} else {
    echo "Por favor, digite algo na barra de pesquisa.";
}
?>
