<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/adm/produtos.css">
    <title>Produtos</title>
</head>
<body>
    <!-- Navbar Padrão -->
    <nav id="navbar">
       <!-- Navbar Mobile -->
    <nav id="mobileNavbar">
        <div class="toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <!-- Navbar Padrão -->
    <nav id="navbar">
        <div id="logo"><img src="../assets/imgs/logo.jpg" alt="Logo Promel"></div>

        <div id="user_menu">
            <div class="icone title"><img src="../assets/imgs/icons/Group.svg" style="margin-right: 10px;">Minha Conta</div>
            <div id="user_pages">
                <div class="linha"><div class="seta"></div><a class="botao" href="./perfil.php"><p>Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="./alterarsenha.php"><p>Trocar Senha</p></a></div>
            </div>
            
            <div id="other_pages">
                <a href="./estoque.php"><img src="../assets/imgs/icons/estoque.svg"><p>Estoque</p></a>
                <a href="./encomendas.php"> <img src="../assets/imgs/icons/encomendas.svg"><p>Encomendas</p></a>
            </div>           
             
            <div id="sair"><a href="./config/logout.php"><img src="../assets/imgs/icons/logout.svg"><p>Sair</p></a></div>
        </div>
    </nav>

    <!-- Titulo -->
    <div id="containertotal">
        <h3 id="Title" class="my-md-5">Estoque</h3>
    
    <!-- botoes -->
    <div id="botoes">
        <a id="button" href="./estoque.php"><button class="button" id="btn1"><img src="../assets/imgs/icons/barra_menu.svg" id="icon_btn_adm">Tudo</button></a>
        <a id="button" href="./produtos.php"><button class="button" id="btn2"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm">Produtos</button></a>
        <a id="button" href="./categorias.php"><button class="button" id="btn3"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm">Categorias</button></a>
        <a id="button" href=""><button class="button" id="btn4">Ordenar Por</button></a>
    </div>
 
    <!-- barra de pesquisa -->
    <div id="barra_pesquisa">
        <input type="search" placeholder="Procurar produtos..." id="text_buscar">
    </div>

    <button id="botao_add"><p id="aumentar">+</p>Adicionar produto</button>

    <div id="all_produtos">        
        <!-- produto 1 -->
        <div id="produto">
            <div id="img_prodt_div" class="col-4">
                <img id="img_prodt" src="../assets/imgs/produtos/WhatsApp Image 2024-03-20 at 15.38.44.jpeg">
            </div>

            <div id="info_prodt" class="col-8">
                <p>nome</p>

                <div id="all_info">
                    <p id="txt1">Categoria:</p>
                    <p id="txt2">Preço:</p>
                    <p id="txt3">Vendidos:</p>
                </div>

                <div id="valores"><p>Estoque: [valor] unidades</p><button>Editar</button></div>
            </div>
        </div>

         <!-- produto 2 -->
         <div id="produto">
            <div id="img_prodt_div" class="col-4">
                <img id="img_prodt" src="../assets/imgs/produtos/WhatsApp Image 2024-03-20 at 15.38.44.jpeg">
            </div>

            <div id="info_prodt" class="col-8">
                <p>nome</p>

                <div id="all_info">
                    <p id="txt1">Categoria:</p>
                    <p id="txt2">Preço:</p>
                    <p id="txt3">Vendidos:</p>
                </div>

                <div id="valores"><p>Estoque: [valor] unidades</p><button>Editar</button></div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>