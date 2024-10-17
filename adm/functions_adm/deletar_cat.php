<?php
    // DELETAR
    require_once '../../connection/connection.php';

    $categoria_ID = ((int)$_GET['categoria_ID']);

    $sqlDeleteCategoria = "DELETE FROM categoria WHERE categoria_ID = :categoria_ID";
    $stmt = $conn->prepare($sqlDeleteCategoria);
    $stmt->bindValue(':categoria_ID', $categoria_ID);
    $stmt->execute();
?>

<meta http-equiv="refresh" content="0; url=../categorias.php">
