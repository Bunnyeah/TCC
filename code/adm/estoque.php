<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/estoque.css">
    <title>Estoque</title>
</head>
<body>
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
            <div class="icone title"><img src="../assets/imgs/Group.svg" style="margin-right: 10px;">Minha Conta</div>
            <div id="user_pages">
                <div class="linha"><div class="seta"></div><a class="botao pagatual" href=""><p>Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href=""><p>Trocar Senha</p></a></div>
            </div>
            <div>
                <a href="./estoque.php"><img src="../assets/imgs/icons/estoque.svg"><p>Estoque</p></a>
                <a href="./encomendas.php"> <img src="../assets/imgs/icons/pacote_entrega.svg"><p>Encomendas</p></a>
            </div>
        </div>
    </nav>

    <!-- Titulo -->
    <div id="containertotal">
        <h3 id="Title" class="my-md-5">Estoque</h3>
    
    <!-- botoes -->
    <div id="botoes">
        <a id="button" href=""><button class="button" id="btn1"><img src="../assets/imgs/icons/barra_menu.svg" id="icon_btn_adm">Tudo</button></a>
        <a id="button" href=""><button class="button" id="btn2"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm">Produtos</button></a>
        <a id="button" href=""><button class="button" id="btn3"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm">Categorias</button></a>
        <a id="button" href=""><button class="button" id="btn4">Ordenar Por</button></a>
    </div>

    <!-- barra de pesquisa -->
    <div id="barra_pesquisa">
        <input type="search" placeholder="Procurar produtos..." id="text_buscar">
    </div>

    <div id="all_produts">
        <!-- produto 1 -->
        <div id="produto">
            <div id="img_prodt_div" class="col-4">
                <img id="img_prodt" src="../assets/imgs/produtos/1-removebg-preview.png">
            </div>
            <div id="info_prodt" class="col-8">
                <!-- nome -->
                <p>Atroflex - Flora Green</p>
                <!-- preço -->
                <p>R$ 30,00</p>
                <!-- quantidade no estoque -->
                    <p id="estoque">Estoque: 90 itens</p>
            </div>
        </div>
    <br>
        <!-- produto 2 -->
        <div id="produto">
            <div id="img_prodt_div" class="col-4">
                <img id="img_prodt" src="../assets/imgs/produtos/1-removebg-preview.png">
            </div>
            <div id="info_prodt" class="col-8">
                <!-- nome -->
                <p>Atroflex - Flora Green</p>
                <!-- preço -->
                <p>R$ 30,00</p>
                <!-- quantidade no estoque -->
                    <p id="estoque">Estoque: 90 itens</p>
            </div>
        </div>
    </div>

    </div>   


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>