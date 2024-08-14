<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./assets/css/usuario.css" rel="stylesheet">
    <title>Configurações da Conta</title>
</head>
<body>
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
        <h3 class="my-5">Configurações da Conta</h3>
        <form enctype="multipart/form-data" class="row" action="./config/update.php" method="POST">
            <div class="col-md-7 col-sm-12 mt-3">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome de usuário" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="insira seu email" required>
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(xx) xxxxx-xxxx" maxlength="20">
                </div>
            </div>

            <!-- Foto de Perfil -->
            <div id="img_perfil" class="col-md-4 col-sm-12">
                <img src="./assets/imgs/img_perfil.png" alt="Imagem de perfil">
                <button type = "button" id = "inputFile">Escolher imagem</button>
                <input type="file" name="fotoperfil">
            </div>

            <script>
                const button = document.getElementById("inputFile");
                const inputFile = document.querySelector("[type=file]");
                button.addEventListener("click", () => {
                    // Simula um clique no input file
                    inputFile.click()
                })
            </script>




            <!-- Outras Informações -->
            <div class="mb-3">
                <label for="another_info" class="form-label">Outras Informações</label>
                <textarea id="another_info" class="form-control" name="info" rows="3" style="resize: none;"></textarea>
            </div>

            <!-- Submit -->
            <div class="mb-3">
                <button type="submit" id="submit" class="btn btn-primary mt-3">Salvar todas as alterações</button>
            </div>
        </form>
    </div>
</body>
</html>
