<?php

require_once '../../connection/connection.php';

extract($_POST);

$sql = "UPDATE categoria SET Nome = :Nome:, Cor_Caixa = :Cor_Caixa WHERE categoria_ID = :categoria_ID";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':Nome', $Nome);
$stmt->bindValue(':Cor_Caixa', $Cor_Caixa);
$stmt->bindValue(':categoria_ID', $categoria_ID);
$stmt->execute();

header("Location: ../categorias.php");
?>