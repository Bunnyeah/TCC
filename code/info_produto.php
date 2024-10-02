<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <input type="search" placeholder="Buscar..." id="text_buscar">
                <img src="./assets/imgs/icons/pesquisa.svg" id="img_buscar">

            <!-- icone "conta" -->
                <img src="./assets/imgs/icons/conta.svg" id="icone_menu">

            <!-- icone "carrinho" -->
                <img src="./assets/imgs/icons/carrinho.svg" id="icone_menu">
        </nav>
    </header>

    <!-- CONTEUDO -->
    <main>
        <img src="" alt="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div id="div_img_prod" >
                        <div>
                            <img src="/assets/imgs/produtos/WhatsApp Image 2024-03-20 at 15.38.46 (2).jpeg">
                        </div>
                        <div>
                            <img id="img_produto" src="./assets/imgs/produtos/image-removebg-preview (2).png">

                        </div>
                    </div>
                </div>



                <div class="col-6">                
                <!-- ESQUEMA DE AVALIAÇÃO C/ ESTRELA -->
                <div id="avaliacao">
                    <ul>
                        <li id="satar-icon ativo" data-avaliacao="1"></li>
                        <li id="satar-icon" data-avaliacao="2"></li>
                        <li id="satar-icon" data-avaliacao="3"></li>
                        <li id="satar-icon" data-avaliacao="4"></li>
                        <li id="satar-icon" data-avaliacao="5"></li>
                    </ul>
                    <script>
                        //Essa função vai funcionar da seguinta forma:
                        //   - quando o usuario passar o cursor por cima das estralas elas vao sendo preenchidas apartir disso,
                        // OBS: oq estiver no lado esquerdo sera preenchido, e do lado direito ficará vazio.

                        //   - apartido do momento que o usuario clicar na estrela, dependendo de sua posição, sera marcado, preenchendo
                        // EX: se ele clicar na segunda a primeira e a segunda serão preeenchidas.

                        var stars = document.querySelectorAll('.star-icon'); //selecionando as estrelas
                        document.addEventListener('click',function(e){ //função para acontecer o evento ao clicar
                            var classStar = e.target.classList; // selecionando a estrela principal pela classe
                            if(!classStar.contains('ativo')){ // condicional (verificar se tem o "ativo", ou seja qnd clica), 
                            //e se n tiver tira de todas as outras a class "ativo"
                                stars.forEach(function(star){
                                    star.classList.remove('ativo');
                                });
                                classStar.add('ativo'); //adicionar o ativo para ficar check a estrela
                            }
                        });
                    </script>
                </div>

                    <!-- Valor do Produto -->
                    <a id="rs">R$</a>30,00
                    <hr>
                    <div>
                        <p></p>
                        <!-- Informações do Frete --> 
                        <div id="frete_info">
                    <div>
                        <p>Frete para</p>
                        <!-- <input type="text"> -->
                        <img src="">
                    </div>

                    <div>
                        <p>Valor</p>
                        <!-- calcular valor de acordo com o local (pesquisar) -->
                        <script>
                            
                        </script>
                        <img src="">
                    </div>
                    </div>

                    <!-- Quantidade  -->
                    <div>
                        <p>Quantidade</p>
                        <!-- adicionar botão de aumentar ou diminuir a quantidade de produto (pesquisar) -->
                        <p>200 unidades disponiveis</p>
                    </div>

                    <div>
                        <button id="btn" type="button" class="btn btn-primary"><img src="./assets/imgs/icons/carrinho1.svg" >Adicionar ao Carrinho</button>
                        <button id="btn1" type="button" class="btn btn-primary">Comprar agora</button>
                    </div>
                    <hr>
                    <!-- Descrição - Produto -->
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
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
            <img src="./assets/imgs/formas_pagamento/img_cartao_visa.png" id="formas_pag">
            <img src="./assets/imgs/formas_pagamento/img_mastercard.png" id="formas_pag">
            <img src="./assets/imgs/formas_pagamento/img_cartao_elo.png" id="formas_pag">
            <img src="./assets/imgs/formas_pagamento/pix_logo.jpeg" id="formas_pag">                    
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