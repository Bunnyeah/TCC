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
        <div id="logo"><img src="../assets/imgs/logo.jpg" alt="Logo Promel"></div>
        <div id="user_menu">
            <div class="icone title"><img src="../assets/imgs/Group.svg" style="margin-right: 10px;">Minha Conta</div>
            <div id="user_pages">
                <div class="linha"><div class="seta"></div><a class="botao" href="./usuario-perfil.php"><p>Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="./usuario-endereco.php"><p>Endereço</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao pagatual" href="./usuario-alterarsenha.php"><p>Trocar Senha</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="./usuario-historico.php"><p>Histórico</p></a></div>
            </div>
            <div id="kitar"><a href="../config/logout.php"><p style="color: rgb(255, 0, 0);">Sair</p></a></div>
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