<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="./assets/css/cadastro.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.19/inputmask.min.js"></script>
    <title>Configurações da Conta</title>
</head>
<body>

    <div id="container" style="margin:0;">
        <div class="row">
            <div id="img" class="col-md-6 col-sm-12"></div>

            <div id="form" class="col-md-6 col-sm-12">
                <h3 class="my-5" style="padding-left: 10vw;">Cadastrar</h3>

                <div id="linkagem">
                    <a id="link" href="./login.php">Já possui uma conta?<p>Entre!</p></a>
                </div>

                <div class="col-10" style="padding-left: 10vw;">
                    <form id="formcad" enctype="multipart/form-data" class="row" action="./config/cadastrar.php" method="POST">
                        <div class="col-12 mt-3">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome de usuário" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="insira seu email" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira sua senha" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmsenha" class="form-label">Confirmar Senha</label>
                                <input type="password" class="form-control" id="confirmsenha" name="confirmsenha" placeholder="Confirme sua senha" required>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="mb-3" id="buttonsubmit">
                            <a id="link_senha" href="./login.php">Esqueci minha senha</a>
                            <button type="submit" id="submit">></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        Inputmask({
            regex: "[A-Za-zÀ-ÿ ]*"
        }).mask("#nome");

        Inputmask({
            alias: "email"
        }).mask("#email");

        Inputmask({
            regex: "[A-Za-z0-9]{8,20}"
        }).mask("#senha");

        Inputmask({
            regex: "[A-Za-z0-9]{8,20}"
        }).mask("#confirmsenha");

    </script>

</body>
</html>
