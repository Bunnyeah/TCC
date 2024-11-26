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
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Resultados da Pesquisa</title>
   
</head>
<?php include "header.php"; ?>

<body>
    <hr>
    <h1>Produtos relacionados</h1>
    <hr>
    <div class="lista-produtos">
        <?php if (!empty($produtos)): ?>
            <?php foreach ($produtos as $produto): ?>
                <div class="produto-card">
                    <img src="assets/imgs/produtos/<?= htmlspecialchars($produto['imagem']); ?>" 
                         alt="<?= htmlspecialchars($produto['Nome_produto']); ?>">
                    <div class="produto-detalhes">
                        <p class="produto-preco">
                            R$<?= number_format($produto['Preco_Und'], 2, ',', '.'); ?>
                        </p>
                        <p class="produto-nome"><?= htmlspecialchars($produto['Nome_produto']); ?></p>
                    </div>
                    <a href="./info_produto.php?id=<?= $produto['produto_ID']; ?>" class="btn-comprar">Comprar</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
