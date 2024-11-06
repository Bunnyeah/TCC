<?php
require_once "./connection/connection.php";
$sqlListarProdutos = "SELECT * FROM produto";
$stmt = $conn->query($sqlListarProdutos);
$produtos = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300..900&family=Roboto+Serif:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Home Page</title>
</head>
<body>
    <?php include "header.php"; ?>

    <!-- Carrossel -->
    <div id="carouselExample" class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/imgs/decorativo/1.png" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="./assets/imgs/decorativo/2.png" alt="Banner 2">
            </div>
        </div>
        <button class="carousel-control prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-icon prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-icon next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>

    <!-- Categorias -->
    <section class="categorias">
        <div class="categoria">
            <p>Produtos Fitness</p>
            <div class="categoria-linha destaque-amarelo"></div>
        </div>
        <div class="categoria">
            <p>Saúde</p>
            <div class="categoria-linha destaque-azul"></div>
        </div>
        <div class="categoria">
            <p>Beleza</p>
            <div class="categoria-linha destaque-cinza"></div>
        </div>
    </section>

    <!-- Produtos Mais Populares -->
    <section class="produtos-populares">
        <h2 class="titulo-populares">Mais Populares</h2>
        <div class="lista-produtos">
            <?php foreach ($produtos as $produto): ?>
                <div class="produto-card">
                    <img src="assets/imgs/produtos/<?= $produto->imagem; ?>" alt="<?= $produto->Nome_produto; ?>">
                    <div class="produto-detalhes">
                        <p class="produto-preco">R$<?= number_format($produto->Preco_Und, 2, ',', '.'); ?></p>
                        <p class="produto-nome"><?= $produto->Nome_produto; ?></p>
                    </div>
                    <a href="./info_produto.php?id=<?= $produto->produto_ID; ?>" class="btn-comprar">Comprar</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>
</html>