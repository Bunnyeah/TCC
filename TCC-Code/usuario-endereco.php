<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./assets/css/usuario-endereco.css" rel="stylesheet">
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
        <div id="logo"><img src="./assets/imgs/logo.jpg" alt="Logo Promel"></div>
        <div id="user_menu">
            <div class="icone title"><img src="./assets/imgs/Group.svg" style="margin-right: 10px;">Minha Conta</div>
            <div id="user_pages">
                <div class="linha"><div class="seta"></div><a class="botao" href="./usuario-perfil.php"><p>Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao pagatual" href="./usuario-endereco.php"><p>Endereço</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="./usuario-alterarsenha.php"><p>Trocar Senha</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao " href="./usuario-historico.php"><p>Histórico</p></a></div>
            </div>
            <div id="kitar"><a href="./config/logout.php"><p style="color: rgb(255, 0, 0);">Sair</p></a></div>
        </div>
    </nav>

    <div class="container">
        <div class="quadrado">
            <h3 id="title" class="my-md-5">Endereços</h3>

            <div class="image">
                <img src="./assets/imgs/Sem enderecos.svg">
            </div>
            <div class="mb-3">
                    <button type="submit" id="submit" class="btn btn-primary mt-3">Inserir Novo endereço</button>
            </div>
        </div>
    </div>

    
</body>

<script src="./assets/js/mobileNavbar.js"></script>
</html>
