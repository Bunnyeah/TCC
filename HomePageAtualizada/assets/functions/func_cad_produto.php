<?php

require_once '../connect/connection.php';

extract($_POST);

$sqlInsertProduto = "INSERT INTO produto VALUES(0,:nome_produto,:preco)";

$stmt = $conn->prepare($sqlInsertProduto);
$stmt->bindValue(':nome_produto', $nome_produto);
$stmt->bindValue(':preco', $preco);
$stmt->execute();
?>
<script>alert('Produto cadastrado com sucesso')</script>
<meta http-equiv="refresh" content="0; url=../index.php">