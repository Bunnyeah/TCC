<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/adm/produtos.css">
        <link rel="stylesheet" href="../assets/css/nav.css">
        <title>Produtos</title>
    </head>
    <body>
        <div id="messageContainer"></div>
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
                    <a class="botao pagatual" href="./estoque.php"><img src="../assets/imgs/icons/estoque.svg"><p>Estoque</p></a>
                    <a href="./encomendas.php"> <img src="../assets/imgs/icons/encomendas.svg"><p>Encomendas</p></a>
                </div>
                
                <div id="sair"><a href="../config/logout.php"><img src="../assets/imgs/icons/logoutbranco.svg"><p>Sair</p></a></div>
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
                <a id="button" href="./categorias.php"><button class="button" id="btn3"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm">Categorias</button></a>
                <a id="button" href=""><button class="button" id="btn4">Ordenar Por</button></a>
            </div>

            <!-- barra de pesquisa -->
            <div id="barra_pesquisa">
                <input type= "search" placeholder="Procurar produtos..." id="text_buscar">
            </div>

            <button id="botao_add"onclick="addproduto()"><p id="aumentar">+</p>Adicionar produto</button> <!-- Butão -->

            <div id="all_produtos">
            <?php
            session_start();
            require_once '../connection/connection.php';

            // if (isset($_SESSION["loggedin"])) {
                $sql = 'SELECT * FROM produto';
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $lista = $stmt->fetchAll(PDO::FETCH_OBJ);
                } else {
                    $lista = [];
                }
            foreach($lista as $produtos){ ?>
                <!-- produto 1 -->
                <div id="produto">
                    <div id="img_prodt_div" class="col-4">
                        <img id="img_prodt" src="<?=$produtos->imagem?>">
                    </div>
                    <div id="info_prodt" class="col-8">
                    <div class="centralizar">
                        <p><?=$produtos->Nome_produto?></p>
                        <input class="form-control" type="number" name="produto_ID" value="<?=$produtos->produto_ID?>" style="display: none"; readonly>
                    </div>
                        <div id="all_info">
                            <input id="txt1" value="Categoria: " readonly></input>
                            <input id="txt2" value="Preço: <?=$produtos->Preco_Und?>" readonly></input>
                            <input id="txt3" value="Quantia Vendidas <?=$produtos->Qnt_vend?>"readonly></input>
                            <div class="linhabaixo">
                                <input id="txt4" value="Estoque: <?=$produtos->Qtd_stock?>"readonly></input>
                                <button onclick="editproduto(<?=$produtos->produto_ID?>)">Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
        }
            // } else {
            //     header("Location: ./login.php");
            //     exit();
            // }
        ?>
            </div>
        </div>
        <!-- Formulário de Adição -->
<div id="addproduto">
    <a class="close" id="close">X</a>
    <form enctype="multipart/form-data" action="../config/cadproduto.php" id="formaddproduto" method="POST">
        <div id="img_perfil" class="col-md-4 col-sm-12 mb-5 mt-4">
            <label for="newprodutoimg">
                <img src="../assets/imgs/decorativo/arraste_img.png" id="imgperfilAdd">
            </label>
            <input type="file" id="newprodutoimg" name="newprodutoimg">
            <button type="button" id="inputFileAdd" class="d-none">Escolher imagem</button>
        </div>
        <div class="inputs">
            <input class="form-control" type="text" id="nome_produto_add" name="Nome_produto" placeholder="Nome do produto" required><br>
            <input class="form-control" type="number" id="preco_und_add" name="Preco_Und" placeholder="Preço Unitário" required><br>
            <input class="form-control" type="number" id="qtd_stock_add" name="Qtd_stock" placeholder="Quantidade em estoque" required><br>
            <textarea class="form-control" id="descricao_add" name="Descricao" placeholder="Descrição" style="resize: none;" required></textarea><br>
            <button type="submit" class="submit">Salvar</button>
        </div>
    </form>
</div>

<!-- Formulário de Edição -->
<div id="editproduto">
    <a class="close" id="close">X</a>
    <form enctype="multipart/form-data" action="../config/editproduto.php" id="formeditproduto" method="POST">
        <div id="img_perfil" class="col-md-4 col-sm-12">
            <label for="editprodutoimg">
                <img src="../assets/imgs/logo.jpg" id="imgperfilEdit">
                <input type="file" id="editprodutoimg" name="editprodutoimg">
                <button type="button" id="inputFileEdit" class="d-none">Escolher imagem</button>
            </label>
            <input type="number" onclick="deleteproduto(<?=$produtos->produto_ID?>)" id="delete" class="submit btn" style="background-color: red !important;" readonly></input>

        </div>
        <div class="inputs">
        <input class="form-control" type="number" id="id_produto_edit" name="produto_ID" placeholder="ID" required><br>
            <input class="form-control" type="text" id="nome_produto_edit" name="Nome_produto" placeholder="Nome do produto" required><br>
            <input class="form-control" type="number" id="preco_und_edit" name="Preco_Und" placeholder="Preço Unitário" required><br>
            <input class="form-control" type="number" id="qtd_stock_edit" name="Qtd_stock" placeholder="Quantidade em estoque" required><br>
            <textarea class="form-control" id="descricao_edit" name="Descricao" placeholder="Descrição" style="resize: none;" required></textarea><br>
            <button type="submit" class="submit">Salvar</button>
        </div>
    </form>
</div>

        <script>
            // document.getElementById("delete").onsubmit = function(event) {

            // }
        </script>
        <script src="../assets/js/produto.js"></script>
        <script src="../assets/js/mobileNavbar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>