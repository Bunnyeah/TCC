<?php
session_start();
require_once '../connection/connection.php';
$response = [];

if (isset($_GET['id'])) {
    $produto_id = intval($_GET['id']);
    error_log("ID do produto: " . $produto_id); // Log do ID do produto

    // Verifica se o produto existe
    $sql_check = 'SELECT * FROM produto WHERE produto_ID = :produto_ID';
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bindParam(':produto_ID', $produto_id);
    $stmt_check->execute();

    if ($stmt_check->rowCount() > 0) {
        // Prepara e executa a consulta de exclusão
        $sql = "DELETE FROM produto WHERE produto_ID = :produto_ID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':produto_ID', $produto_id, PDO::PARAM_INT);

        if ($stmt->execute()) { 
            $response['message'] = 'Produto deletado com sucesso';
        } else { 
            $response['message'] = 'Erro ao deletar o produto';
        }
    } else { $response['message'] = 'Produto não encontrado';}
} else { $response['message'] = 'ID do produto não fornecido.';}
echo json_encode($response);
?>
