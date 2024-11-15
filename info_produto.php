<?php
$corDeFundo = "burlywood";

require_once "./connection/connection.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/info_produto.css">
    <title>Informações dos Produtos</title>
</head>
<body>

<?php include "header.php" ?>
<?php

//exibe valores do sesssion
// var_dump($_SESSION['carrinho']);

// Deleta uma session inteira
// session_destroy();


// Obtém o ID do produto da URL
$produtoId = $_GET['id'];

if ($produtoId) {
    // Prepara e executa a consulta para buscar o produto pelo ID
    $stmt = $conn->prepare("SELECT * FROM produto WHERE produto_ID = :id");
    $stmt->bindValue(':id', $produtoId);
    $stmt->execute();
    $produto = $stmt->fetch(PDO::FETCH_OBJ); // Obtém o produto como objeto
}

// Adiciona o produto ao carrinho se o botão foi clicado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_carrinho'])) {
    
    $quantidade = $_POST['quantidade'] ?? 1;
    
    // Inicializa o carrinho na sessão, se não existir
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Adiciona o produto ao carrinho na sessão
    $_SESSION['carrinho'][] = [
        'id' => $produto->produto_ID,
        'nome' => $produto->Nome_produto,
        'preco' => $produto->Preco_Und,
        'quantidade' => $quantidade,
        'imagem' => $produto->imagem
    ];

    // Redireciona para o carrinho e evitar reenvio de formulário
    header("Location: carrinho.php");
    exit;
}
?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div id="div_img_prod">
                    <?php if ($produto): ?>
                        <img id="img_produto" src="./assets/imgs/produtos/<?= $produto->imagem ?>">
                    </div>
                </div>

                <div class="col-6">
                    <hr>
                    <h1 class="titulo p-2"><?= $produto->Nome_produto; ?></h1>
                    <p><a id="rs">R$</a><?= number_format($produto->Preco_Und, 2, ',', '.'); ?></p>
                    <hr>

                    <!-- Quantidade em Estoque -->
                    <p>Quantidade em estoque: <?= $produto->Qtd_stock; ?></p>
                    <hr>

                    <form method="POST">
                        <p>Quantidade da compra:</p>
                        <div class="contador-container">
                            <button class="contador-button" type="button" onclick="updateContador(-1)">-</button>
                            <input type="text" class="contador-input" id="contador" name="quantidade" value="1" readonly>
                            <button class="contador-button" type="button" onclick="updateContador(1)">+</button>
                        </div>

                        <script>
                            function updateContador(valor) {
                                var contadorInput = document.getElementById('contador');
                                var novaQuantidade = parseInt(contadorInput.value) + valor;
                                
                                if (novaQuantidade >= 1) {
                                    contadorInput.value = novaQuantidade;
                                }
                            }
                        </script>

                        <!-- Botão "Adicionar ao Carrinho" que envia o formulário via POST -->
                             <button id="btn" type="submit" name="adicionar_carrinho" class="btn btn-primary mt-4" >Adicionar ao Carrinho</button>
                    </form>

                    <a href="https://wa.me/5515996810765?text=Olá, estou interessado no produto <?= $produto->Nome_produto ?>">
                        <button id="btn1" type="button" class="btn btn-primary mt-4">Comprar agora</button>
                    </a>

                    <hr>
                    <p><?= $produto->Descricao; ?></p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>
</main>

<?php include "footer.php" ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>