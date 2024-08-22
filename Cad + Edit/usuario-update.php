<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./assets/css/update.css" rel="stylesheet">
    <link rel = "stylesheet" href = "./assets/css/style.css">
    <title>Configurações da Conta</title>
</head>
<body>

    <?php
        require_once './connection/connection.php';
        extract($_POST);
        $sql = 'SELECT * FROM cliente WHERE ID_cliente = 1';
        $stmt = $conn->query($sql);
        $lista = $stmt->fetchAll(PDO::FETCH_OBJ);
    ?>
    <?php foreach($lista as $cliente){ ?>

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
            <div class="icone"><img src="./assets/imgs/Group.svg" style="margin-right: 10px;">Minha Conta</div>
            <div id="user_pages">
                <div class="linha"><div class="seta"></div><a href=""><p class="botao pagatual">Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a href=""><p class="botao">Endereço</p></a></div>
                <div class="linha"><div class="seta"></div><a href=""><p class="botao">Trocar Senha</p></a></div>
                <div class="linha"><div class="seta"></div><a href=""><p class="botao">Histórico</p></a></div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3 id="title" class="my-md-5">Configurações da Conta</h3>
        <form enctype="multipart/form-data" class="row" action="./config/update.php" method="POST">
            <div class="col-md-7 col-sm-12 mt-3">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?=$cliente->Nome;?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?=$cliente->Email;?>" required>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" value="<?=$cliente->Telefone;?>" maxlength="11">
                </div>
            </div>

            <!-- Foto de Perfil -->
            <div id="img_perfil" class="col-md-4 col-sm-12 mb-5">
                <img src="./assets/imgs/img_perfil.png" alt="Imagem de perfil">
                <button type = "button" id = "inputFile">Escolher imagem</button>
                <input type="file" name="fotoperfil">
            </div>

            <!-- Outras Informações -->
            <div class="mb-3">
                <label for="another_info" class="form-label">Outras Informações</label>
                <textarea id="another_info" class="form-control" name="info" rows="3" style="resize: none;"><?=$cliente->Telefone;}?></textarea>
            </div>

            <!-- Submit -->
            <div class="mb-3">
                <button type="submit" id="submit" class="btn btn-primary mt-3">Salvar todas as alterações</button>
            </div>
        </form>
    </div>
</body>
<script src="./assets/js/usuario-update.js"></script>
</html>
