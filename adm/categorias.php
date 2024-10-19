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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/adm/categorias.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <title>Categorias</title>
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

    <a href="#abrir"><button type="submit" class="botao_add">+</button></a>

        <!-- TODAS AS CATEGORIAS -->
        <div class="all_categorias">
            <?php foreach ($categorias as $categoria){ ?>
                <div class="categoria">
                    <p class="namecat"><?= $categoria->Nome?></p>
                    <a class="edit" href="#update" onclick="editcategoria(<?=$categoria->categoria_ID?>)"><img src="../assets/imgs/icons/editar_cat.svg"></a>
                    <a class="delete" href="./functions_adm/deletar_cat.php?categoria_ID=<?= $categoria->categoria_ID ?>"><img src="../assets/imgs/icons/apagar_cat.svg"></a>
                </div>
            <?php
                }
            ?>
        </div>

        <!-- pop-up inserir -->
        <div id="abrir" class="modalDialog">
            <div>
            <a href="#close" title="Close" class="close">X</a>
            <form id="form_categoria" action="./functions_adm/cadastrar_cat.php" method="POST">
                <h2>Inserir nova Categoria</h2>
                    <label for="nome_categoria">Categoria</label> 
                    <input type="text" placeholder="coloque o nome aqui" name="Nome"  id="nome_categoria" required autocomplete="off">
                    <input type="hidden" name="Cor_Caixa" id="cor_categoria"> <!-- Campo oculto para cor -->
                    <button type="submit" id="botao_inserir">Inserir</button>
                </div>
            </form>
        </div>

        <!-- pop-up atualizar -->
            <div id="update" class="modalDialog">
                <div>
                <form id="form_categoria" action="./functions_adm/editar_cat.php" method="POST">
                    <a href="#close" title="Close" class="close">X</a>
                    <h2>Editar Categoria</h2>
                    <label for="edittextcat">Nome Novo</label> 
                    <input type="text" id="edittextcat" name="Nome" required autocomplete="off">
                    <!-- <input type="hidden" name="Cor_Caixa" id="cor_categoria"> Campo oculto para cor -->
                    <input type="hidden" name="categoria_ID" id="editcategoriaid">
                    <button type="submit" id="botao_salvar">Salvar</button></a>
                </div>
                </form>
            </div>
    <script>
        function editcategoria(categoriaID) {

    fetch(`./functions_adm/editar_cat.php?id=${categoriaID}`)
        .then(response => {
            // if (!response.ok) { //Só verificação de erro
            //     throw new Error('Erro na rede');
            // }
            return response.json()
        })
        .then(data => {
            console.log("Dados do produto:", data);

            // Preencher os campos do formulário de edição
            if (!data.error) {
                console.log(data)
                document.getElementById('edittextcat').value = data.Nome;
                document.getElementById('editcategoriaid').value = data.categoria_ID;
            } else {
                alert(data.error);
            }
        })
        .catch(error => {
            console.error('Erro ao buscar os dados do produto', error);
        });
}
    </script>
    <script src="../adm/functions_adm/script.js"></script>
    <script src="../assets/js/mobileNavbar.js"></script>
</body>
</html>