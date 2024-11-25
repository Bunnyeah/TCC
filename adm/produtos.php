<!DOCTYPE html>

    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/adm/produtos.css">
        <link rel="stylesheet" href="../assets/css/nav.css">
        <title>Produtos</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    </head>
    <body>
        <div id="messageContainer"></div>
        <!-- Navbar Mobile -->
        <?php include "navbar.php"?>
        <script>
            const paginas = document.querySelectorAll('.botao');
            paginas[2].classList.add('pagatual');
            </script>
        <!-- Titulo -->
        <div id="containertotal">
            <h3 id="Title" class="my-md-5">Estoque</h3>

            <!-- botoes -->
            <div id="botoes">
                <a href="./estoque.php"><button class="button" id="btn1"><img src="../assets/imgs/icons/barra_menu.svg" id="icon_btn_adm"><span class="txtbutton">Tudo</span></button></a>
                <a href="./produtos.php"><button class="button" id="btn2"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm"><span class="txtbutton">Produtos</span></button></a>
                <a href="./categorias.php"><button class="button" id="btn3"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm"><span class="txtbutton">Categorias</span></button></a>
                <a href=""><button class="button" id="btn4"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm"><span class="txtbutton">Ordenar Por</span></button></a>
            </div>

            <!-- barra de pesquisa -->
            <div id="barra_pesquisa">
                <input type= "search" placeholder="Procurar produtos..." id="text_buscar">
            </div>

            <button id="botao_add" onclick="addproduto()"><img src="../assets/imgs/icons/plus.svg" id="icon_btn_adm"><span class="txtbutton"> Adicionar produto</span></button> <!-- Butão -->

            <div id="all_produtos">
            <?php
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
                <div id="produto">
                    <div id="img_prodt_div" class="col-5">
                        <img id="img_prodt" src="../assets/imgs/produtos/<?=$produtos->imagem?>">
                    </div>
                    <div id="info_prodt" class="col-7">
                    <div class="centralizar">
                        <p><?=$produtos->Nome_produto?></p>
                        <input class="form-control" type="number" name="produto_ID" value="<?=$produtos->produto_ID?>" style="display: none"; readonly>
                    </div>
                        <div id="all_info">
                            <!-- <div id="txt1"><p>Categoria: <?=$categoria->Nome?></p></div> -->
                            <div id="txt2"><p>Preço: <?=$produtos->Preco_Und?> (unidade) </p></div>
                            <div id="txt3"><p>Qtds Vendidas <?=$produtos->Qnt_vend?></p></div>
                            <div class="linhabaixo">
                                <div id="txt4"><p>Estoque: <?=$produtos->Qtd_stock?></p></div>
                                <button onclick="editproduto(<?=$produtos->produto_ID?>)" class="btn_edit">Editar</button>
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
    <form enctype="multipart/form-data" action="./functions_adm/cadproduto.php" id="formaddproduto" method="POST">
        <div id="img_perfil" class="col-md-4 col-sm-12 mb-5 mt-4">
            <label for="newprodutoimg">
                <img src="../assets/imgs/decorativo/arraste_img.png" id="imgperfilAdd">
            </label>
            <input type="file" id="newprodutoimg" name="newprodutoimg">
            <button type="button" id="inputFileAdd" class="d-none">Escolher imagem</button>
        </div>
        <div class="inputs">
            <label for="nome_produto_add">Nome do Produto:</label>
            <input class="form-control" type="text" id="nome_produto_add" name="Nome_produto" placeholder="Nome do produto" required autocomplete="off">

            <label for="preco_und_add">Preço Unitário:</label>
            <input class="form-control" type="text" id="preco_und_add" name="Preco_Und" minlength="0" placeholder="Preço Unitário" required>

            <label for="qtd_stock_add">Quantidade em Estoque:</label>
            <input class="form-control" type="number" id="qtd_stock_add" name="Qtd_stock" minlength="0" placeholder="Quantidade em estoque" required>

            <label for="selectcategoria">Categoria:</label>
            <select class="form-control" id="selectcategoria" name="fk_categoria_ID">
                <option value="">Selecionar Categoria</option>
                <?php
                    $sql1 = 'SELECT * FROM categoria';
                    $stmt = $conn->prepare($sql1);
                    $stmt->execute();
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['categoria_ID'].'">'.$row['Nome'].'</option>';
                    }
                ?>
            </select>

            <label for="descricao_add">Descrição:</label>
            <textarea class="form-control" id="descricao_add" name="Descricao" placeholder="Descrição" style="resize: none;" required></textarea>
            <button type="submit" class="submit">Salvar</button>
        </div>
    </form>
</div>


    <!-- Formulário de Adição -->
    <div id="addproduto" onblur="fecha()">
        <a class="close" id="close">X</a>
        <form enctype="multipart/form-data" action="./functions_adm/cadproduto.php" id="formaddproduto" method="POST">
            <div id="img_perfil" class="col-md-4 col-sm-12 mb-5 mt-4">
                <label for="newprodutoimg">
                    <img src="../assets/imgs/decorativo/arraste_img.png" id="imgperfilAdd">
                </label>
                <input type="file" id="newprodutoimg" name="newprodutoimg">
                <button type="button" id="inputFileAdd" class="d-none">Escolher imagem</button>
            </div>
            <div class="inputs">
                <input class="form-control" type="text" id="nome_produto_add" name="Nome_produto" placeholder="Nome do produto" required autocomplete="off">

                <!-- SELECIONAR CATEGORIA -->
                <select id="qtd_stock_add" name="fk_categoria_ID" class="categ">
                    <option value="">Selecionar Categoria</option>
                    <?php
                        $sql1 = 'SELECT * FROM categoria';
                        $stmt = $conn->prepare($sql1);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row['categoria_ID'].'">'.$row['Nome'].'</option>';
                        }
                ?>
                </select>

                <input class="form-control" type="number"  id="preco_und_add" name="Preco_Und" minlength="0" placeholder="Preço Unitário" required>
                <input class="form-control" type="number" id="qtd_stock_add" name="Qtd_stock" minlength="0" placeholder="Quantidade em estoque" required>
                <textarea class="form-control" id="descricao_add" name="Descricao" placeholder="Descrição" style="resize: none;" required></textarea>
                <button type="submit" class="submit">Salvar</button>
            </div>
        </form>
    </div>

<!-- Formulário de Edição -->
<div id="editproduto">
    <a class="close" id="close">X</a>
    <form enctype="multipart/form-data" action="./functions_adm/editproduto.php" id="formeditproduto" method="POST">
        <div id="img_perfil" class="col-md-4 col-sm-12">
            <label for="editprodutoimg">
                <img src="../assets/imgs/logo.jpg" id="imgperfilEdit">
                <input type="file" id="editprodutoimg" name="editprodutoimg">
                <button type="button" id="inputFileEdit" class="d-none">Escolher imagem</button>
            </label>
            <p type="text" onclick="deleteproduto(<?=$produtos->produto_ID?>)" id="delete" class="submit btn" style="color: red !important;" readonly>deletar produto</p>

        </div>
        <div class="inputs">
        <input class="form-control d-none" type="number" id="id_produto_edit" name="produto_ID" placeholder="ID" required><br>
            <input class="form-control" disabled type="text" id="nome_produto_edit" name="Nome_produto" placeholder="Nome do produto" autocomplete="off" required><br>

             <!-- SELECIONAR CATEGORIA -->
             <select id="qtd_stock_add" name="fk_categoria_ID" class="categ">
                    <option value="">Selecionar Categoria</option>
                    <?php
                        $sql1 = 'SELECT * FROM categoria';
                        $stmt = $conn->prepare($sql1);
                        $stmt->execute();
                        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row['categoria_ID'].'">'.$row['Nome'].'</option>';
                        }
                ?>
                </select>

            <input class="form-control" type="number" id="preco_und_edit" name="Preco_Und" placeholder="Preço Unitário" required><br>
            <input class="form-control" type="number" id="qtd_stock_edit" name="Qtd_stock" placeholder="Quantidade em estoque" required><br>
            <textarea class="form-control" id="descricao_edit" name="Descricao" placeholder="Descrição" style="resize: none;" required></textarea><br>
            <button type="submit" class="submit">Salvar</button>
        </div>
    </form>
</div>
<script>
<<<<<<< HEAD
    $(document).ready(function () {
            $('#preco_und_add').mask('000.000.000.000.000,00', {reverse: true});
        });
        
=======
   $(document).ready(function () {
            $('#preco_und_add').mask('#.##0,00', {reverse: true});
        });

        $(document).ready(function () {
            $('#preco_und_edit').mask('#.##0,00', {reverse: true});
        });
>>>>>>> 9772a9d7538b02bb030b99abcd51eb46dad4b319
</script>


    
        <script src="../assets/js/produto.js"></script>
        <script src="../assets/js/mobileNavbar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
    </body>
</html>
