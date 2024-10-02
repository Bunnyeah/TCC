<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Configurações da Conta - Histórico de Compras">
    <meta name="keywords" content="conta, histórico, compras">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/usuario-endereco.css" rel="stylesheet">
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
            <div class="icone title"><img src="../assets/imgs/Group.svg" alt="Minha Conta" style="margin-right: 10px;">Minha Conta</div>
            <div id="user_pages">
                <div class="linha"><div class="seta"></div><a class="botao" href="./perfil.php"><p>Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="./endereco.php"><p>Endereço</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="./alterarsenha.php"><p>Trocar Senha</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao pagatual" href="./historico.php"><p>Histórico</p></a></div>
            </div>
            <div id="kitar"><a href="../config/logout.php"><p style="color: rgb(255, 0, 0);">Sair</p></a></div>
        </div>
    </nav>

    <div class="container">
        <div class="quadrado">
            <h3 id="title" class="my-md-5">Histórico de Compras</h3>
        </div>
    </div>

    <script src="../assets/js/mobileNavbar.js"></script>
</body>
</html>
