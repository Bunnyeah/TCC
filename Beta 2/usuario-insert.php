<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./assets/css/usuario-insert.css" rel="stylesheet">
    <title>Configurações da Conta</title>
</head>
<body>

    <div class="container-fluid" style="margin:0;">
        <div class="row">
            <div class="img col-5">
                <img src="./assets/imgs/img_login.jpg">
            </div>

            <div class="col-6">
                <h3 class="my-5" style="margin-left: 10vw;">Cadastro de usuário</h3>
                <div class="col-10" style="margin-left: 10vw;">
                <form enctype="multipart/form-data" class="row" action="insert.php" method="POST">
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
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira sua senha" required>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="mb-3">
                        <button type="submit" id="submit" class="btn btn-primary mt-3">Avançar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
