<?php

$corDeFundo = "burlywood";

require_once "./assets/connect/connection.php";

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
    <title>Informações dos Produtos</title>
</head>
<body>

    <!-- MENU -->
    <header>
        <nav id="menu">
            <!-- logo -->
            <img src="./assets/imgs/logo/logo (2).jpg" alt="Logo Armazém Brasil" id="logo">

            <!-- barra de pesquisa -->
            <div>
              <input id="text_buscar" type="search" placeholder="Buscar...">
            </div>

            <!-- icone "conta" -->
            <div class="header_conta">
              <ul>
                <li><a href="./assets/imgs/icons/conta.svg">
                  <img src="./assets/imgs/icons/conta.svg" alt="conta" id="icone_menu2">
                </a>
                  <ul class="dropdown">
                      <li>login</li>
                      <li>favoritos</li>
                      <li>sair</li>
                  </ul>
              </li>
              </ul>
            </div>

            <!-- icone "carrinho" -->
            <img src="./assets/imgs/icons/carrinho.svg" id="icone_menu">
        </nav>
    </header>

    <!-- CONTEUDO -->
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div id="div_img_prod">
                        <?php if ($produto): ?>
                            <img id="img_produto" src="./assets/imgs/produtos/image-removebg-preview (2).png" alt="<?= $produto->Nome_produto; ?>">
                        </div>
                    </div>

                    <div class="col-6">
                        <!-- Valor do Produto -->
                         <hr>
                        <h1 class="titulo p-2"><?= $produto->Nome_produto; ?></h1>
                        <a id="rs">R$</a><?= number_format($produto->Preco_Und, 2, ',', '.'); ?>
                        <hr>

                        <!-- Informações do Frete -->
                        <div id="frete_info">
                            <p>Frete para:</p>
                        </div>

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
                        <button id="btn" type="button" class="btn btn-primary">
                            <img src="./assets/imgs/icons/carrinho1.svg"> Adicionar ao Carrinho
                        </button>
                        <button id="btn1" type="button" class="btn btn-primary">Comprar agora</button>

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

    <!-- RODAPÉ -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3" id="itens_icns">
            <h4>Contatos</h4>
            <ul id="contatos_lista">
              <li><img src="./assets/imgs/icons/instagram.svg" alt="icone instagram" id="img_inst"> Instagram</li>
              <li><img src="./assets/imgs/icons/whatsapp.svg" alt="icone whatapp" id="img_wpp"></i> Whatsapp</li>
              <li><img src="./assets/imgs/icons/tiktok.svg" alt="icone TikTok" id="img_ttk"></i></i> TikTok</li>
            </ul>
          </div>
          <div class="col-md-3">
            <h4>Conheça-nos</h4>
            <ul id="informacoes_lista">
              <li>Sobre a Loja</li>
              <li>Sobre o Cliente</li>
            </ul>
          </div>
          <div class="col-md-3">
            <h4>Formas de Pagamento</h4>
            <ul id="formas_pag_lista">
              <li><img src="./assets/imgs/formas_pagamento/img_mastercard.png" alt="icone Cartao de Credito" id="img_cred"> Cartão de Crédito</li>
              <li><img src="./assets/imgs/formas_pagamento/img_cartao_visa.png" alt="icone Cartao Debito" id="img_deb"> Cartão de Débito</li>
              <li><img src="./assets/imgs/formas_pagamento/pix_logo.jpeg" alt="icone Pix" id="img_pix"> Pix</li>
              <li>Boleto Bancário</li>
            </ul>
          </div>
          <div class="col-md-3">
            <h4>Outras Plataformas</h4>
            <ul id="outras_plataformas_lista">
              <li><img src="./assets/imgs/plataformas_compra/shoppe.png" alt="icone Shopee" id="img_shp"> Shopee</li>
              <li><img src="./assets/imgs/plataformas_compra/mercado_livre.png" alt="icone Mercado Livre" id="img_ml"> Mercado Livre</li>
              <li><img src="./assets/imgs/icons/facebook.svg" alt="icone Facebook" id="img_fc"> Facebook</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <hr>
            <p class="text-center">© 2024 Armazém Brasil - Desenvolvido por Davi Natan Bianchi, Edisom Coelho Junior, Nicolas Moro Mota e Vitor Melendes Diardina. Todos os direitos reservados</p>
          </div>
        </div>
      </div>
      
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
