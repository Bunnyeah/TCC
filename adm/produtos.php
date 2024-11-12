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
    <!-- Formulário de Adição -->
    <div id="addproduto">
        <a class="close" id="close">X</a>
        <form enctype="multipart/form-data" action="../config/cadproduto.php" id="formaddproduto" method="POST">
            <div class="inputs">
                <input class="form-control" type="text" id="nome_produto_add" name="Nome_produto" placeholder="Nome do produto" required autocomplete="off"><br>
                <!-- Máscara simples para moeda e estoque -->
                <input class="form-control" type="text" id="preco_und_add" name="Preco_Und" placeholder="Preço Unitário" required oninput="formatCurrency(this)"><br>
                <input class="form-control" type="text" id="qtd_stock_add" name="Qtd_stock" placeholder="Quantidade em estoque" required oninput="formatInteger(this)"><br>
                <textarea class="form-control" id="descricao_add" name="Descricao" placeholder="Descrição" style="resize: none;" required></textarea><br>
                <button type="submit" class="submit">Salvar</button>
            </div>
        </form>
    </div>

    <!-- Funções JavaScript Simplificadas -->
    <script>
        function formatCurrency(input) {
            
            let value = input.value.replace(/\D/g, "");

<<<<<<< HEAD
            
            input.value = "R$ " + (value / 100).toFixed(2).replace(".", ",");
        }
=======
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
                <div id="produto">
                    <div id="img_prodt_div" class="col-4">
                        <img id="img_prodt" src="../assets/imgs/produtos/<?=$produtos->imagem?>">
                    </div>
                    <div id="info_prodt" class="col-8">
                    <div class="'centralizar'">
                        <p><?=$produtos->Nome_produto?></p>
                        <input class="form-control" type="number" name="produto_ID" value="<?=$produtos->produto_ID?>" style="display: none"; readonly>
                    </div>
                        <div id="all_info">
                            <!-- <input id="txt1" value="Categoria: " readonly></input> -->
                            <!-- <input id="txt1" value="Categoria "readonly>$produtos->Nome_categoria</input> -->
                            <input id="txt2" value="Preço: <?=$produtos->Preco_Und?>" readonly></input>
                            <input id="txt3" value="Qtds Vendidas <?=$produtos->Qnt_vend?>"readonly></input>
                            <div class="linhabaixo">
                                <input id="txt4" value="Estoque: <?=$produtos->Qtd_stock?>"readonly></input>
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
    <form enctype="multipart/form-data" action="../config/cadproduto.php" id="formaddproduto" method="POST">
        <div id="img_perfil" class="col-md-4 col-sm-12 mb-5 mt-4">
            <label for="newprodutoimg">
                <img src="../assets/imgs/decorativo/arraste_img.png" id="imgperfilAdd">
            </label>
            <input type="file" id="newprodutoimg" name="newprodutoimg">
            <button type="button" id="inputFileAdd" class="d-none">Escolher imagem</button>
        </div>
        <div class="inputs">
            <input class="form-control" type="text" id="nome_produto_add" name="Nome_produto" placeholder="Nome do produto" required autocomplete="off"><br>
            <input class="form-control" type="number" id="preco_und_add" name="Preco_Und" minlength="0" placeholder="Preço Unitário" required><br>
            <input class="form-control" type="number" id="qtd_stock_add" name="Qtd_stock" minlength="0" placeholder="Quantidade em estoque" required><br>
            <select id="qtd_stock_add" name="fk_categoria_ID">
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
            <textarea class="form-control" id="descricao_add" name="Descricao" placeholder="Descrição" style="resize: none;" required></textarea><br>
            <button type="submit" class="submit">Salvar</button>
        </div>
    </form>
</div>
>>>>>>> add16ea0ba7dd7b7d335ee9b97e81c0b7eef4e7a

        function formatInteger(input) {
            
            input.value = input.value.replace(/\D/g, "");
        }
    </script>

    <script src="../assets/js/produto.js"></script>
    <script src="../assets/js/mobileNavbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
