<?php

require_once '../../connection/connection.php';

extract($_POST);

$sql = "UPDATE categoria SET Nome = :nomeNovo, Cor_Caixa = :Cor_Caixa WHERE categoria_ID = :categoria_ID";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':nomeNovo', $nomeNovo);
$stmt->bindValue(':Cor_Caixa', $Cor_Caixa);
$stmt->bindValue(':categoria_ID', $categoria_ID);
$stmt->execute();

header("Location: ../categorias.php");
?>