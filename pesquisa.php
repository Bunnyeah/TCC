<?php
require_once './connection/connection.php';


$query = $_GET['query'];
$produtos = [];

if (!empty($query)) {
    try {
        $stmt = $conn->prepare("SELECT * FROM produto WHERE Nome_produto LIKE :query");
        $stmt->bindValue(':query', '%' . $query . '%');
        $stmt->execute();
        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro na busca de produtos: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <style>
        .produto {
            margin-bottom: 15px;
            padding: 10px;
            border: 3px solid #ccc;
            border-radius: 5px;
            background: #f1f1f1;
        }
        .verMais{
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<?php include "header.php"; ?>

<body>
    <hr>
    <h1>Produtos relacionados</h1>
    <hr>
    <?php if (!empty($produtos)): ?>
        <?php foreach ($produtos as $produto): ?>
            <div class="produto">
                <h3><?php echo htmlspecialchars($produto['Nome_produto']); ?></h3>
                <p><?php echo htmlspecialchars($produto['Descricao']); ?></p>
                <a class="verMais" href="info_produto.php?id=<?php echo $produto['produto_ID']; ?>">Ver mais</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>

</body>
</html>
