<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/usuario-alterarsenha.css" rel="stylesheet">
    <title>Configurações da Conta</title>
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
                <div class="linha"><div class="seta"></div><a class="botao" href="./perfil.php"><p>Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao pagatual" href="./alterarsenha.php"><p>Trocar Senha</p></a></div>
            </div>

            <div id="other_pages">
                <a class="botao pagatual" href="./estoque.php"><img src="../assets/imgs/icons/estoque.svg"><p>Estoque</p></a>
                <a href="./encomendas.php"> <img src="../assets/imgs/icons/encomendas.svg"><p>Encomendas</p></a>
            </div>   

            <div id="sair"><a href="../config/logout.php"><img src="../assets/imgs/icons/logoutbranco.svg"><p>Sair</p></a></div>
            </div>
    </nav>

    <div class="container">
        <div class="quadrado">
            <h3 id="title" class="my-md-5">Alterar Senha</h3>



            <form id="formcad" enctype="multipart/form-data" class="row" method="POST">
                        <div class="image">
                            <img src="./assets/imgs/Imagem.svg">
                        </div>
                        <div class="col-12 mt-3">
                            <div class="mb-3">
                                <label for="Usuário" class="form-label">Email</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome de usuário" required>
                            </div>
                            <div class="mb-3">
                                <label for="Senha antiga" class="form-label">Senha antiga</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="insira seu email" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha nova" class="form-label">Senha Nova</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira sua senha" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Confirmar Senha</label>
                                <input type="password" class="form-control" id="confirmsenha" name="confirmsenha" placeholder="Confirme sua senha" required>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="mb-3">
                            <button type="submit" id="submit" class="btn btn-primary mt-3">Confirmar</button>
                        </div>
                    </form>
        </div>
    </div>

    
</body>
<script src="../assets/js/mobileNavbar.js"></script>
</html>
</html>