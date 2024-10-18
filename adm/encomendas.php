<?php 
require_once '../connection/connection.php';
$sql = "SELECT * FROM categoria";
$conn = $conn->query($sql);
$categorias = $conn->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/adm/encomendas.css">
    <title>Encomendas</title>
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
    <div id="logo"><a href="../homepage.php"><img src="../assets/imgs/logo.jpg" alt="Logo Promel"></a></div>

        <div id="user_menu">
            <div class="icone title"><img src="../assets/imgs/icons/Group.svg" style="margin-right: 10px;">Minha Conta</div>
            <div id="user_pages">
                <div class="linha"><div class="seta"></div><a class="botao" href="perfil.php"><p>Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="alterarsenha.php"><p>Trocar Senha</p></a></div>
            </div>

            <div id="other_pages">
                <a class="botao pagatual" href="./estoque.php"><img src="../assets/imgs/icons/estoque.svg"><p>Estoque</p></a>
                <a href="./encomendas.php"> <img src="../assets/imgs/icons/encomendas.svg"><p>Encomendas</p></a>
            </div>           

            <div id="sair"><a href="../config/logout.php"><img src="../assets/imgs/icons/logout.svg"><p>Sair</p></a></div>
        </div>
    </nav>

    <!-- Titulo -->
    <div id="containertotal">
        <h3 id="Title" class="my-md-5">Encomendas</h3>
    
    <!-- botoes -->
    <div id="botoes">
        <button id="btn1" class="button" type="submit" name="Status" value="">Retirar Loja</button>
        <button id="btn2" class="button" type="submit" name="Status" value="A Caminho">A Caminho</button>
        <button id="btn3" class="button" type="submit" name="Status" value="Entregue">Entregues</button>
        <button id="btn4" class="button" type="submit" name="Status" value="Cancelado">Cancelados</button>
        <button id="btn5" class="button" type="submit" name="Status" value="Cancelado">Ocorrencias</button>
    </div>

    <!-- barra de pesquisa -->
    <div id="barra_pesquisa">
        <input type="search" placeholder="Procurar produtos..." id="text_buscar">
    </div>

    <div id="all_produts">
        <!-- produto 1 -->
            <div id="produto">
                    <a href="" data-tooltip="Mais Informações">
                    <div id="img_prodt_div" class="col-4">
                        <img id="img_prodt" src="../assets/imgs/produtos/WhatsApp Image 2024-03-20 at 15.38.44.jpeg">
                    </div>
                    <div id="info_prodt" class="col-8">
                        <!-- nome -->
                        <p id="txt">Atroflex - Flora Green</p>
                        <!-- preço -->
                        <p id="txt">R$ 30,00</p>
                    </div>
                </a>
            </div>

            
            <div id="produto">
                    <a href="" data-tooltip="Mais Informações">
                    <div id="img_prodt_div" class="col-4">
                        <img id="img_prodt" src="../assets/imgs/produtos/WhatsApp Image 2024-03-20 at 15.38.44.jpeg">
                    </div>
                    <div id="info_prodt" class="col-8">
                        <!-- nome -->
                        <p id="txt">Atroflex - Flora Green</p>
                        <!-- preço -->
                        <p id="txt">R$ 30,00</p>
                    </div>
                </a>
            </div>



    <!-- DIV QUE ACABA O "ALL PRODUTS"(ele organiza todos os produtos de dois em dois quebrando quando acontece isso)   -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>