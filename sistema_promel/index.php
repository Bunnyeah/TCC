<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Promel CSS -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <header>
        <div class="container-fluid">
            <div class="row">

                <div class="botao-principal col-10">
                    <!-- Botão Menu -->
                    <img src="./images/8666567_align_justify_icon.png" alt="">
                </div>
                    
                    <!-- Botão Usuario -->
                    <div class="col-1">
                        <button class="perfil"><a href="./categorias/Cad_usuario.php"><img src="./images/8666609_user_icon.png" alt="foto perfil"></a></button>
                    </div>
                                <!-- Carrinho -->
                <div class="carrinho col-1">
                    <button><a href="./categorias/Cad_produto.php"><img src="./images/8666569_shopping_bag_icon.png" alt="foto carriho"></a></button>
                    </div>
            </div>
            

        </div> 

        <!-- Botões Principais -->
        <div class="container-fluid" id="categorias">
            <button><a href="./login2.php">login_usuario👤</a></button>
            <button><a href="./login.php">login_adm👤</a></button>
            <button><a href="./categorias/Cad_usuario.php">Cadastar Usuario 👤</a></button>
            <button><a href="./categorias/Cad_adm.php">Cadastar Usuario Admininstrador 👤</a></button>
            <button><a href="./categorias/Cad_produto.php">Cadastar Produto 📦</a></button>
            <button><a href="./Estoque/Estoque.php">Estoque 📦</a></button>
        </div>
    </header>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>


