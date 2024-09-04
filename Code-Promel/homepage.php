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
        <nav id="menu">
            <!-- logo -->
                <img src="./assets/imgs/logo/logo (2).jpg" alt="Logo Armazém Brasil" id="logo">

            <!-- barra de pesquisa -->
                <input type="search" placeholder="Buscar..." id="text_buscar">
                <img src="./assets/imgs/icons/pesquisa.svg" id="img_buscar">

            <!-- icone "conta" -->
                <img src="./assets/imgs/icons/conta.svg" id="icone_menu">

            <!-- icone "carrinho" -->
                <img src="./assets/imgs/icons/carrinho.svg" id="icone_menu">
        </nav>
        
        <!-- Catalogo -->
        <nav id="menu_itens">
            <img src="./assets/imgs/icons/barra_menu.svg" id="group" >

            <a href="">Todos
            <img src="./assets/imgs/icons/seta_baixo.svg" id="seta"></a>

            <a href="">Fitoterápicos
            <img src="./assets/imgs/icons/seta_baixo.svg" id="seta"></a>

            <a href="">Nutraceuticos
            <img src="./assets/imgs/icons/seta_baixo.svg" id="seta"></a>

            <a href="">Nutrição Esportiva
            <img src="./assets/imgs/icons/seta_baixo.svg" id="seta"></a>

            <a href="">Fragrancias
            <img src="./assets/imgs/icons/seta_baixo.svg" id="seta"></a>

            <a href="">Mel
            <img src="./assets/imgs/icons/seta_baixo.svg" id="seta"></a>

            <!-- OBS: deve ter um jeito melhor de arrumar essas setas e que economize cod também, se um de vcs souberem
            ou acharem coloquem -->
        </nav>
    </header>

    <!-- CONTEÚDO -->
    <main>
        <!--Carrossel - Slider-->
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./assets/imgs/decorativo/banner1.jpeg" class="d-block w-100" id="banner1">
              </div>
              <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
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
        <div id="alinhando">
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
        <div>
          <p id="title">Mais Populares</p>
          
          <div id="populares">
          <!-- produto 1 -->
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top">
                <div class="card-body" id="produtos">
                  <p class="card-title">R$ 30,00</p>
                  <p class="card-text">Ômega 3 Perfect Care 1000Mg</p>
                  <button><a href="#" class="btn btn-primary">Comprar</a></button>
                </div>
              </div>

            <!-- produto 1 -->
            <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top">
              <div class="card-body" id="produtos">
                <p class="card-title">R$ 30,00</p>
                <p class="card-text">Ômega 3 Perfect Care 1000Mg</p>
                <button><a href="#" class="btn btn-primary">Comprar</a></button>
              </div>
            </div>

            <!-- produto 1 -->
            <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top">
              <div class="card-body" id="produtos">
                <p class="card-title">R$ 30,00</p>
                <p class="card-text">Ômega 3 Perfect Care 1000Mg</p>
                <button><a href="#" class="btn btn-primary">Comprar</a></button>
              </div>
            </div>

            <!-- produto 1 -->
            <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top">
              <div class="card-body" id="produtos">
                <p class="card-title">R$ 30,00</p>
                <p class="card-text">Ômega 3 Perfect Care 1000Mg</p>
                <button><a href="#" class="btn btn-primary">Comprar</a></button>
              </div>
            </div>

            <!-- produto 1 -->
            <div class="card" style="width: 18rem;">
              <img src="..." class="card-img-top">
              <div class="card-body" id="produtos">
                <p class="card-title">R$ 30,00</p>
                <p class="card-text">Ômega 3 Perfect Care 1000Mg</p>
                <button><a href="#" class="btn btn-primary">Comprar</a></button>
              </div>
            </div>
          </div>
        </div>

        <!-- Informações Categorias -->
        <!-- "menu categorias" -->
        <div>
          
        </div>
        <div class="container-fluid">
          <div class="row">
            <!-- Video Tik Tok -->
            <div class="col-6" id="video">
              <video src=""></video>
            </div>
            <!-- informações sobre oq é a categoria e seus beneficios -->
            <div  class="col-6" id="txt">
              <p></p>
            </div>
          </div>
        </div>

        <!-- Localização do Estabelecimento Físico -->
        <div>
          <img src="">
          <p>Endereço: Rua Coronel Arruda Botelho, 291 - Centro, Boituva - SP, 18550-000</p>
          <p>Telefone: (15) 3316-5606</p>
          <p>Horário de funcionamento: Aberto ⋅ Fecha às 19:00</p>
          <img src="./assets/imgs/icons/seta_baixo_preta.svg" id="seta_menor">

          <div>
            <img src="">
            <a href="https://www.google.com/maps/place/Loja+Promel+Produtos+Naturais/@-23.284528,-47.6746072,17z/data=!3m1!4b1!4m6!3m5!1s0x94c5e3f97216ab7d:0xb2de7e58cc205fad!8m2!3d-23.2845329!4d-47.6720323!16s%2Fg%2F11h201n_pb?entry=ttu"></a>
          </div>
        </div>

    </main>

    <!-- RODAPÉ -->
    <footer>
          <div id="alinhar">
            <!-- contatos -->
            <div> 
              <h5 id="title_fot">Contatos</h5>
              
              <div id="div_txt">
                <img src="./assets/imgs/icons/instagram.svg" id="icone_fot">
                <p>Instagram</p>
              </div>

              <div id="div_txt">
                <img src="./assets/imgs/icons/whatsapp.svg" id="icone_fot">
                <p>Whatsapp</p>
              </div>

              <div id="div_txt">
                <img src="./assets/imgs/icons/tiktok.svg" id="icone_fot">
                <p>TikTok</p>
              </div>
            </div>
            
            <!-- informações gerais -->
            <div> 
              <h5 id="title_fot">Conheça-nos</h5>

                <div id="div_txt">
                  <a href="" id="link_fot">Sobre a Loja</a>
                  <a href="" id="link_fot">Sobre o Cliente</a>
                </div>

            </div>
            
            <!-- informações pagamento -->
            <div> 
              <h5 id="title_fot">Formas de Pagamento</h5>
              <hr id="linha">

              <div id="div_txt_pag">
                <img src="./assets/imgs/formas_pagamento/img_cartao_visa.png" id="icone_fot">
                <img src="./assets/imgs/formas_pagamento/img_mastercard.png" id="icone_fot">
                <img src="./assets/imgs/formas_pagamento/img_cartao_elo.png" id="icone_fot">
                <img src="./assets/imgs/formas_pagamento/pix_logo.jpeg" id="icone_fot">                    
              </div>
                <p>Ou se preferir você pode pagar pela loja fisíca</p>
            </div>
          </div>

        <hr><!-- divisão - linha -->
        <div>
          <!--direitos autorais-->
            <p class="copy">&copy;2024 Armazém Brasil - Desenvolvido por Davi Natan Bianchi, Edisom Coelho Junior, Nicolas Moro Mota e Vitor Melendes Diardina. Todos os direitos reservados</p>
        </div>
    </footer>        
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>