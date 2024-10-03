<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produto 📦</title>
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
    <form action="../functions/func_cad_produto.php" method="POST">
        <div class="form-group" id="nome_produto">
            <label for="nome_produto">Nome</label>
            <input type="text" class="form-control" name="nome_produto" id="nome_produto">
        </div>
        <div class="form-group" id="preco">
            <label for="preco">Preço</label>
            <input type="text" class="form-control" name="preco" id="preco">
        </div>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>