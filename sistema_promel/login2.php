<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
</head>
<body>
<form action="./functions/func_login_usuario" method="POST">
        <div class="form-group" id="email_usuario">
            <label for="email_usuario">E-mail</label>
            <input type="email" class="form-control" name="email_usuario" id="email_usuario">
        </div>
    
        <div class="form-group" id="senha_usuario">
            <label for="senha_usuario">Senha</label>
            <input type="password" class="form-control" name="senha_usuario" id="senha_usuario">
        </div>
        <button type="submit">Fazer login</button>
    </form>
</body>
</html>