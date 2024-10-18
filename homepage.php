<?php
require_once "./connection/connection.php";
$sqlListarProdutos = "SELECT * FROM produto";
$stmt = $conn->query($sqlListarProdutos);
$produtos   = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Home Page</title>
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
            <a href="./homepage.php"><img src="./assets/imgs/logo/logo (2).jpg" alt="Logo Promel"></a>
            <!-- barra de pesquisa -->
            <div>
              <input id=text_buscar type="search" placeholder="Buscar...">
            </div>

            <!-- Cachoeira Conta -->
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

    <!-- CONTEÚDO -->
    <main>
        <!--Carrossel - Slider-->
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./assets/imgs/decorativo/1.png" class="d-block w-100" id="banner1">
              </div>
              <div class="carousel-item">
                <img src="./assets/imgs/decorativo/2.png" class="d-block w-100" alt="banner2">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

        
        <!-- Categorias Extras -->
        <div id="alinhando" style="display: flex;justify-content: center; background: linear-gradient(#2C7669, #FFFFFF);">
          <div id="caixa1">
            <p>Produtos Fitness</p>
            <div id="cor_fit">
              <img src="">
            </div>
          </div>

          <div id="caixa1">
            <p>Saúde</p>
            <div id="cor_saude">
              <img src="">
            </div>
          </div>

          <div id="caixa1">
            <p>Beleza</p>
            <div id="cor_beleza">
              <img src="">
            </div>
          </div>
        </div>

        <!-- Produtos Mais Populares -->
        <p id="title">Mais Populares</p>
        <div id="popdivares" class="row">
            <?php foreach ($produtos as $produto): ?>
                <div class="col-6 col-md-4 mb-3"> <!-- Colunas com margem inferior -->
                    <div class="card" style="width: 100%;">
                        <div class="card-body" id="produtos">
                            <p class="card-title">R$<?= number_format($produto->Preco_Und, 2, ',', '.'); ?> </p>
                            <p class="card-text"><?= $produto->Nome_produto; ?> </p>
                            <button><a href="./info_produto.php?id=<?= $produto->produto_ID; ?>" class="btn btn-primary">Comprar</a></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Informações Categorias -->
          <!-- Seta Lateral -->
          <div class="seta_lateral" onclick="toggleMenu()">></div>

          <!-- Menu Lateral -->
          <div class="seta_lateral_menu" id="setaMenu">
              <div>
                  <p>Fitoterápicos</p>
                  <p>Nutraceuticos</p>
                  <p>Nutrição Esportiva</p>
              </div>
          </div>

          <script>
              function toggleMenu() {
                  var menu = document.getElementById('setaMenu');
                  menu.classList.toggle('show');
              }
          </script>
        
        <div class="container-fluid">
          <div class="row">
            <!-- Video Tik Tok -->
            <div class="col-6" id="video">
              <a href=""><video src=""></video></a>
            </div>
            
            <!-- informações sobre oq é a categoria e seus beneficios -->
            <div  class="col-6" id="txt">
              <p></p>
            </div>
          </div>
        </div>

        <!-- Localização do Estabelecimento Físico -->
        <div class="endereco-container">
          <div id="endereco-image">
            <div id="local"><img src="./assets/imgs/icons/location.svg"></div>
          </div>
          <div class="endereco-items">
            <span>Endereço: Rua Coronel Arruda Botelho,291 - Centro Boituva - SP,18550-000</span>
            <span>Telefone: (15)3316-5606</span>
            <span>Horario de Funcionamento: Aberto as 08:00 Fecha as 19:00 <img src="./assets/imgs/icons/seta_baixo_preta.svg" alt="setinha" id="setinha"></span>
          </div>
          <div id="div_img">
            <a href="https://www.google.com/maps/place/Rua+Coronel+Arruda+Botelho,+291+-+Vila+Ferriello,+Boituva+-+SP,+18550-000/@-23.284528,-47.6746072,17z/data=!3m1!4b1!4m6!3m5!1s0x94c5e233186b3045:0x30e6e10682358a93!8m2!3d-23.2845329!4d-47.6720323!16s%2Fg%2F11crv8pvp8?entry=ttu&g_ep=EgoyMDI0MTAxNS4wIKXMDSoASAFQAw%3D%3D"><img src="./assets/imgs/decorativo/maps_home.png" alt="Localização"></a>
          </div>
        </div>

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
      <p id="cookie-valor"></p>
    </footer>

    <script src="./assets/js/home.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>