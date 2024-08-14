<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Senha</title>
</head>
<body>
<form action="../functions/func_alterar_senha_usuario.php" method="POST">
<div class="form-group" id="senha_usuario">
            <label for="senha_usuario">Senha Nova</label>
            <input type="password" class="form-control" name="senha_usuario" id="senha_usuario">
        </div>
        <button type="submit">Enviar</button>
        </form>
</body>
</html>