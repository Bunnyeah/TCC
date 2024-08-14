<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiministrador</title>
</head>
<body>
<form action="./functions/func_login_adm.php" method="POST">
        <div class="form-group" id="email_adm">
            <label for="email_adm">E-mail</label>
            <input type="email" class="form-control" name="email_adm" id="email_adm">
        </div>
    
        <div class="form-group" id="senha_adm">
            <label for="senha_adm">Senha</label>
            <input type="password" class="form-control" name="senha_adm" id="senha_adm">
        </div>
        <button type="submit">Fazer login</button>
    </form>
</body>
</html>