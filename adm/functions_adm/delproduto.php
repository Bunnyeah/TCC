<?php
    // DELETAR
    require_once '../../connection/connection.php';

    $produto_ID = ((int)$_GET['produto_ID']);

    $sqlDeleteProduto = "DELETE FROM produto WHERE produto_ID = :produto_ID";
    $stmt = $conn->prepare($sqlDeleteProduto);
    $stmt->bindValue(':produto_ID', $produto_ID);
    $stmt->execute();
?>

<meta http-equiv="refresh" content="0; url=../produtos.php">
