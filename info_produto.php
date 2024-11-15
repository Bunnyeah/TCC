<?php
require_once "./connection/connection.php";

// Obtém o ID do produto da URL
$produtoId = $_GET['id'];
// $produtoId = $_GET['id'] ?? null;

if ($produtoId) {
    // Prepara e executa a consulta para buscar o produto pelo ID
    $stmt = $conn->prepare("SELECT * FROM produto WHERE produto_ID = :id");
    $stmt->bindValue(':id', $produtoId);
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

    <!-- CONTEUDO -->
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div id="div_img_prod">
                        <?php if ($produto): ?>
                            <img id="img_produto" src="./assets/imgs/produtos/<?=$produto->imagem?>">
                        </div>
                    </div>

                    <div class="col-6">
                        <!-- Valor do Produto -->
                        <hr>
                        <h1 class="titulo p-2"><?= $produto->Nome_produto; ?></h1>
                        <a id="rs">R$</a><?= number_format($produto->Preco_Und, 2, ',', '.'); ?>
                        <hr>

    <div id="resultado"></div>

    <script>
        // Gerar números aleatórios para cada estado
        const estados = {};
        for (let i = 1; i <= 27; i++) {
            estados[i] = Math.floor(Math.random() * 27) + 1; // Números aleatórios de 1 a 100
        }

        // Função para exibir o valor correspondente ao estado selecionado
        function mostrarValor() {
            const estadoId = document.getElementById('estado').value;
            const resultado = document.getElementById('resultado');

            if (estadoId) {
                const nomeEstado = document.getElementById('estado').options[document.getElementById('estado').selectedIndex].text;
                resultado.textContent = `Valor para ${nomeEstado}: ${estados[estadoId]}`;
            } else {
                resultado.textContent = '';
            }
        }

        // Adiciona o evento de mudança ao select
        document.getElementById('estado').addEventListener('change', mostrarValor);
    </script>

                        <!-- Quantidade em Estoque -->
                        <p>Quantidade em estoque: <?= $produto->Qtd_stock; ?></p>
                          <hr>

                        <p>Quantidade da compra:</p>
                        <div class="contador-container">
    <button class="contador-button" id="sub" onclick="updateContador(-1)">-</button>
    <input type="text" class="contador-input" id="contador" value="1" readonly>
    <button class="contador-button" id="soma" onclick="updateContador(1)">+</button>
</div>

<script>
    
    function updateContador(contar) {
        var contadorInput = document.getElementById('contador');
        var ContadorTroca = parseInt(contadorInput.value);  
        
        
        if (ContadorTroca + contar >= 1) {
            contadorInput.value = ContadorTroca + contar;
        }
    }
</script>

                        <!-- Botões de Ação -->
                        <button id="btn" type="button" class="btn btn-primary mt-4">
                            Adicionar ao Carrinho
                        </button>
                        <a href="https://wa.me/5515996810765?text=Olá, estou interessado no produto <?=$produto->Nome_produto?>"><button id="btn1" type="button" class="btn btn-primary mt-4">Comprar agora</button></a>

                        <hr>
                        <!-- Descrição do Produto -->
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