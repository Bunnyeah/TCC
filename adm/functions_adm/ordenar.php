<?php

require_once '../../connection/connection.php';

$sql = "SELECT * FROM produto ORDER BY Nome_produto";
$stmt = $conn->prepare($sql);
$ordenar = $stmt->fetchAll(PDO::FETCH_ASSOC);

header("Location: ../produtos.php")

?>