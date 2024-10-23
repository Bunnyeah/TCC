<?php

$corDeFundo = "burlywood";

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
    <title>Informações dos Produtos</title>
</head>
<body>

    <!-- MENU -->
    <header>
    <div id="redes">      
      <img src="./assets/imgs/icons/facebook.svg" alt="icone Facebook">      
      <img src="./assets/imgs/outras_plataformas/tiktok.svg" alt="icone TikTok">
      <img src="./assets/imgs/icons/instagram.svg" alt="icone Instagram">
      <img src="./assets/imgs/icons/whatsapp.svg" alt="icone WhatsApp">
      </div>
        <nav id="menu">
            <!-- logo -->
            <a id="" href="./homepage.php"><img src="./assets/imgs/logo/logo (2).jpg" alt="Logo Armazém Brasil" id="logo"></a>

            <!-- barra de pesquisa -->
            <div>
              <input id="text_buscar" type="search" placeholder="Buscar...">
            </div>

            <!-- icone "conta" -->
            <div class="header_conta">
              <ul>
                  <a><li><img src="./assets/imgs/icons/Group.svg" alt="conta" id="icone_menu2"></a>
  
                  <ul class="dropdown">
                    <a href="./login.php"><li><img src="./assets/imgs/icons/login.svg">Entrar/Login</li></a>
                    <a href="./"><li><img src="./assets/imgs/icons/fav_verde.svg">Meus Favoritos</li></a>
                    <a href=""><li><img src="./assets/imgs/icons/logout_verde.svg">Sair</li></a>
                  </ul>
              </li>
              </ul>
            </div>

            <!-- icone "carrinho" -->
            <a href="./carrinho2.php"><img src="./assets/imgs/icons/carrinho.svg" id="icone_menu"></a>
        </nav>
    </header>

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

                        <!-- Informações do Frete -->
                        <p class="mt-4">Selecione seu Estado para saber seu frete</p>
    <form>
        <label for="estado" class="mb-4">Estado:</label>
        <select id="estado">
            <option value="">Selecione um estado</option>
            <option value="1">Acre (AC)</option>
            <option value="2">Alagoas (AL)</option>
            <option value="3">Amapá (AP)</option>
            <option value="4">Amazonas (AM)</option>
            <option value="5">Bahia (BA)</option>
            <option value="6">Ceará (CE)</option>
            <option value="7">Distrito Federal (DF)</option>
            <option value="8">Espírito Santo (ES)</option>
            <option value="9">Goiás (GO)</option>
            <option value="10">Maranhão (MA)</option>
            <option value="11">Mato Grosso (MT)</option>
            <option value="12">Mato Grosso do Sul (MS)</option>
            <option value="13">Minas Gerais (MG)</option>
            <option value="14">Pará (PA)</option>
            <option value="15">Paraíba (PB)</option>
            <option value="16">Paraná (PR)</option>
            <option value="17">Pernambuco (PE)</option>
            <option value="18">Piauí (PI)</option>
            <option value="19">Rio de Janeiro (RJ)</option>
            <option value="20">Rio Grande do Norte (RN)</option>
            <option value="21">Rio Grande do Sul (RS)</option>
            <option value="22">Rondônia (RO)</option>
            <option value="23">Roraima (RR)</option>
            <option value="24">Santa Catarina (SC)</option>
            <option value="25">São Paulo (SP)</option>
            <option value="26">Sergipe (SE)</option>
            <option value="27">Tocantins (TO)</option>
        </select>
    </form>
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
                        <button id="btn1" type="button" class="btn btn-primary mt-4">Comprar agora</button>

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
        <div id="alinhar_divs">
          <div>
              <h4>Contatos</h4>
              <div id="contatos_lista">
                <a href="https://www.instagram.com/promel_boituva/"><img src="./assets/imgs/icons/instagram.svg" alt="icone Instagram"></a>
                <a href=""><img src="./assets/imgs/icons/whatsapp.svg" alt="icone Whatsapp"></a>
                <a href="https://web.facebook.com/lojapromel/?_rdc=1&_rdr"><img src="./assets/imgs/icons/facebook.svg" alt="icone Facebook"></a>
                </div>
            </div>

            <div>
              <h4>Conheça-nos</h4>
              <div id="informacoes_lista">
                <p>Sobre a Loja</p>
                <p>Sobre o Cliente</p>
              </div>
            </div>

            <div>
              <h4>Formas de Pagamento</h4>
              <hr id="hr_align">
              <div id="formas_pag_lista">
                <img src="./assets/imgs/formas_pagamento/Metodo 01.png">
                <img src="./assets/imgs/formas_pagamento/Metodo 02.png">
                <img src="./assets/imgs/formas_pagamento/Metodo 03.png">
                <img src="./assets/imgs/formas_pagamento/Metodo 04.png">
              </div>
              <p style="text-align: center;padding-top:2vh">Ou se preferir você pode pagar pela loja fisíca</p>
            </div>

            <div>
              <h4>Outras Plataformas</h4>
              <div id="outras_lista">
                <a href=""><img src="./assets/imgs/outras_plataformas/shoppe.svg" alt="icone Shopee">Shopee</a>
                <a href=""><img src="./assets/imgs/outras_plataformas/mercado_livre.svg" alt="icone Mercado Livre">Mercado Livre</a>
                <a href=""><img src="./assets/imgs/outras_plataformas/tiktok.svg" alt="icone TikTok">TikTok</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <hr>
            <p class="text-center" style="font-size: 14px">© 2024 Armazém Brasil - Desenvolvido por Davi Natan Bianchi, Edisom Coelho Junior, Nicolas Moro Mota e Vitor Melendes Diardina. Todos os direitos reservados</p>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
