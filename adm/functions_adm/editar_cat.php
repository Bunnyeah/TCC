<?php
require_once '../../connection/connection.php';

if(isset($_GET['id'])){ // Aqui tá funcionando e devolvendo o ID
    $ID = $_GET['id'];
    

    // Pro antigo nomeda categoria aparecer
    $sqlSelect = 'SELECT * FROM categoria WHERE categoria_ID = :categoria_ID';
    $stmt = $conn->prepare($sqlSelect);
    $stmt->bindParam(':categoria_ID', $ID);
    $stmt->execute();

    if ($stmt->rowCount() > 0) { //Aqui para de funcionar
        $categoria = $stmt->fetch(PDO::FETCH_OBJ);
        // Retorna os dados do produto em formato JSON
        echo json_encode([
            'Nome' => $categoria->Nome,
            'categoria_ID' => $categoria->categoria_ID // Adicione outras propriedades se necessário
        ]);
    }else {
        // Caso não encontre a categoria, você pode retornar um erro ou uma resposta vazia
        echo json_encode(['error' => 'Categoria não encontrada']);
    }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST);

    $sql = "UPDATE categoria SET Nome = :Nome WHERE categoria_ID = :categoria_ID";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':Nome', $Nome);
    $stmt->bindValue(':categoria_ID', $categoria_ID);
    $stmt->execute();
    header("Location: ../categorias.php");
}
?>
