<?php

require_once '../../connection/connection.php';

if (isset($_GET['id'])) { //Aqui eu pego o Fetch pra usar o select e colocar esses valores no formeditproduto
    $categoria_ID = $_GET['id'];

    // Prepara a consulta para obter os detalhes do produto
    $sql = 'SELECT * FROM categoria WHERE categoria_ID = :categoria_ID';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':categoria_ID', $categoria_ID);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $categoria = $stmt->fetch(PDO::FETCH_OBJ);
        // Retorna os dados do produto em formato JSON
        echo json_encode($categoria);
    } else {
        echo json_encode(['error' => 'Produto não encontrado']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);

$sql = "UPDATE categoria SET Nome = :nomeNovo, Cor_Caixa = :Cor_Caixa WHERE categoria_ID = :categoria_ID";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':nomeNovo', $nomeNovo);
$stmt->bindValue(':Cor_Caixa', $Cor_Caixa);
$stmt->bindValue(':categoria_ID', $categoria_ID);
$stmt->execute();

header("Location: ../categorias.php");
}
?>