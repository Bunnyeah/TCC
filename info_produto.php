<?php
require_once "./connection/connection.php";

// Obtém o ID do produto da URL
$produtoId = $_GET['id'] ?? null;

if ($produtoId) {
    // Prepara e executa a consulta para buscar o produto pelo ID
    $stmt = $conn->prepare("SELECT * FROM produto WHERE produto_ID = :id");
    $stmt->bindValue(':id', $produtoId, PDO::PARAM_INT);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_OBJ); // Obtém o produto como objeto
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/info_produto.css">
    <title>Informações do Produto</title>
</head>

    <?php include "header.php" ?>

    <!-- CONTEÚDO -->
    <main class="container my-5">
        <?php if ($produto): ?>
            <div class="row">
                <!-- Coluna da Imagem do Produto -->
                <div class="col-md-6">
                    <div class="product-image-container">
                        <img src="./assets/imgs/produtos/<?= $produto->imagem ?>" alt="<?= htmlspecialchars($produto->Nome_produto) ?>" class="product-image">
                    </div>
                </div>
                
                <!-- Coluna de Informações do Produto -->
                <div class="col-md-6">
                    <!-- Nome e Preço do Produto -->
                    <h1 class="product-title"><?= htmlspecialchars($produto->Nome_produto) ?></h1>
                    plimplimplim avaliação
                    <hr>
                    <p class="product-price">R$ <?= number_format($produto->Preco_Und, 2, ',', '.') ?></p>

                    <!-- Quantidade em Estoque -->
                    <!-- Quantidade da Compra -->
                    <div class="quantity-container d-flex align-items-center mb-4">
                        <p id="titlequantia">Quantidade</p>
                        <div class="quantidade">
                            <button class="btn btn-outline-secondary" onclick="updateQuantity(-1)">-</button>
                            <input type="text" id="quantity" value="1" readonly class="quantity mx-2">
                            <button class="btn btn-outline-secondary" onclick="updateQuantity(1)">+</button>
                        </div>
                        <spam id="estoque" class="product-stock"><p id="textobaixo"><?= htmlspecialchars($produto->Qtd_stock) ?> Unidades disponíveis</p></spam>
                    </div>

                    <!-- Botões de Ação -->
                    <div class="action-buttons d-flex gap-3">
                        <button class="buttoncoisa btn btn-primary flex-fill" id="botaocarrinho">
                        <img src="./assets/imgs/icons/carrinhopreto.svg" id="carrinho">Adicionar ao Carrinho
                        </button>
                        <a href="https://wa.me/5515996810765?text=Olá, estou interessado no produto <?= urlencode($produto->Nome_produto) ?>" class="buttoncoisa btn btn-success flex-fill" target="_blank">
                            Comprar agora
                        </a>
                    </div>

                    <!-- Descrição do Produto -->
                    <hr>
                    <p class="product-description mt-3"><?= nl2br(htmlspecialchars($produto->Descricao)) ?></p>
                </div>
            </div>
        <?php else: ?>
            <p class="text-center">Nenhum produto encontrado.</p>
        <?php endif; ?>
    </main>

    <?php include "footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateQuantity(amount) {
            const quantityInput = document.getElementById('quantity');
            const currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity + amount >= 1) {
                quantityInput.value = currentQuantity + amount;
            }
        }
    </script>
</body>
</html>
