<?php 
require_once '../connection/connection.php';
$sql = "SELECT * FROM produto";
$conn = $conn->query($sql);
$produtos = $conn->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/adm/estoque.css">
    <title>Estoque</title>
</head>
<body>
    
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
        <a id="button" href="./estoque.php"><button class="button" id="btn1"><img src="../assets/imgs/icons/barra_menu.svg" id="icon_btn_adm">Tudo</button></a>
        <a id="button" href="./produtos.php"><button class="button" id="btn2"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm">Produtos</button></a>
        <a id="button" href="./categorias.php"><button class="button" id="btn3"><img src="../assets/imgs/icons/engren.svg" id="icon_btn_adm">Categorias</button></a>
        <a id="button" href=""><button class="button" id="btn4">Ordenar Por</button></a>
    </div>

    <!-- barra de pesquisa -->
    <div id="barra_pesquisa">
        <input type="search" placeholder="Procurar produtos..." id="text_buscar">
    </div>

    <div id="all_produts">
        <?php foreach ($produtos as $produto){ ?>
            <div id="produto">
                    <div id="img_prodt_div" class="col-4">
                        <img id="img_prodt" src="../assets/imgs/produtos/<?=$produto->imagem?>">
                    </div>
                    <div id="info_prodt" class="col-8">
                        <p id="txt"><?= $produto->Nome_produto ?></p>
                        <p id="txt">R$ <?= $produto->Preco_Und ?></p>
                        <!-- quantidade no estoque -->
                        <p id="estoque">Estoque: <?= $produto->Qtd_stock ?> itens</p>
                    </div>
                </div>
        <?php
        }
        ?>
    <!-- DIV QUE ACABA O "ALL PRODUTS"(ele organiza todos os produtos de dois em dois quebrando quando acontece isso)   -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script scr=""></script>
</body>
</html>