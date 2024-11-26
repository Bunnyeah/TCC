<?php include "header.php"; ?>
<?php
// Configuração inicial
require_once "./connection/connection.php";
session_start();
// Obtém o ID do produto da URL
$produtoId = $_GET['id'] ?? null;
if ($produtoId) {
    // Prepara e executa a consulta para buscar o produto pelo ID
    $stmt = $conn->prepare("SELECT     
    produto.produto_ID,
    produto.Nome_produto,
    produto.Preco_Und,
    produto.Qtd_stock,
    produto.Qnt_vend,
    produto.Status_prdt,
    produto.Descricao,
    produto.imagem
    FROM produto WHERE produto_ID = :id");
    $stmt->bindValue(':id', $produtoId, PDO::PARAM_INT);
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

    // Redireciona para o carrinho e evita reenvio de formulário
    header("Location: carrinho.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/info_produto.css">
    <title>Informações do Produto</title>
</head>


<main class="container my-5">
    <?php if ($produtoId && $produto): ?>
        <div class="row">
            <!-- Coluna da Imagem do Produto -->
            <div class="col-md-6">
                <div class="product-image-container">
                    <img src="./assets/imgs/produtos/<?= htmlspecialchars($produto->imagem) ?>" alt="<?= htmlspecialchars($produto->Nome_produto) ?>" class="product-image">
                </div>
            </div>

            <!-- Coluna de Informações do Produto -->
            <div class="col-md-6">
                <!-- Nome e Preço do Produto -->
                <h1 class="product-title"><?= htmlspecialchars($produto->Nome_produto) ?></h1>

                <!-- Avaliação estrela -->

                <?php
                    // Imprimir a mensagem de erro ou sucesso salvo na sessão
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                ?>
                <form method="post" action="./config/processa.php">
                <div class="estrelas">

                    <input type="radio" name="estrela" id="vazio" value="" checked>

                    <label for="estrela-1" class="fa fa-star"></label> 
                    <input type="radio" name="estrela" id="estrela-1" id="vazio" value="1">
                    
                    <label for="estrela-2" class="fa fa-star"></label>
                    <input type="radio" name="estrela" id="estrela-2" id="vazio" value="2">
                    
                    <label for="estrela-3" class="fa fa-star"></label>
                    <input type="radio" name="estrela" id="estrela-3" id="vazio" value="3">
                    
                    <label for="estrela-4" class="fa fa-star"></label>
                    <input type="radio" name="estrela" id="estrela-4" id="vazio" value="4">

                    <label for="estrela-5" class="fa fa-star"></label>
                    <input type="radio" name="estrela" id="estrela-5" id="vazio" value="5">
                    <input type="text" name="idproduto" value="<?=$produto->produto_ID?>" style="display:none">
                    <!-- Avaliação comentário -->
                    <br><textarea name="comentario" rows="4" cols="30" placeholder="Digite o seu comentário..."></textarea>
                    <input type="submit" value="Enviar">
                    </div>
                    </form>

                <hr>
                <p class="product-price">R$ <?= number_format($produto->Preco_Und, 2, ',', '.') ?></p>

                <!-- Quantidade em Estoque -->
                <p id="estoque" class="product-stock"><?= htmlspecialchars($produto->Qtd_stock) ?> Unidades disponíveis</p>
                <hr>

                <!-- Formulário para adicionar ao carrinho -->
                <form method="POST">
                    <!-- Quantidade da Compra -->
                    <div class="quantity-container d-flex align-items-center mb-4">
                        <p id="titlequantia">Quantidade</p>
                        <div class="quantidade">
                            <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity(-1)">-</button>
                            <input type="text" id="quantity" name="quantidade" value="1" readonly class="quantity mx-2">
                            <button class="btn btn-outline-secondary" type="button" onclick="updateQuantity(1)">+</button>
                        </div>
                    </div>

                    <!-- função pop up -->
                    <!-- <script>
                        $("#botaocarrinho").click(function() {
                            swal("Mensagem!");
                        });
                    </script> -->

                    <!-- Botões de Ação -->
                    <div class="action-buttons d-flex gap-3">
                        <button type="submit" name="adicionar_carrinho" class="buttoncoisa btn btn-primary flex-fill" id="botaocarrinho">
                            <img src="./assets/imgs/icons/carrinhopreto.svg" id="carrinho">Adicionar ao Carrinho
                        </button>
                </form>
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

<?php include "footer.php"; ?>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>