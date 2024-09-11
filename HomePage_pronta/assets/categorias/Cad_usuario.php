<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario 👤</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="../functions/func_cad_cliente.php" method="POST">
        <div class="form-group" id="nome_usuario">
            <label for="nome_usuario">Nome</label>
            <input type="text" class="form-control" name="nome_usuario" id="nome_usuario">
        </div>
        <div class="form-group" id="email_usuario">
            <label for="email_usuario">E-mail</label>
            <input type="email" class="form-control" name="email_usuario" id="email_usuario">
        </div>
        <div class="form-group" id="endereco_usuario">
            <label for="endereco_usuario">Endereço</label>
            <input type="text" class="form-control" name="endereco_usuario" id="endereco_usuario">
        </div>
        <div class="form-group" id="senha_usuario">
            <label for="senha_usuario">Senha</label>
            <input type="password" class="form-control" name="senha_usuario" id="senha_usuario">
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>