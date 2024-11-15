<?php

$host = 'localhost'; 
$db = 'promel04'; 
$user = 'root';
$password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}

try {
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $email = trim($_POST['email']);
        $senha_atual = trim($_POST['senha_atual']);
        $nova_senha = trim($_POST['nova_senha']);

        
        if (empty($email) || empty($senha_atual) || empty($nova_senha)) {
            echo "Por favor, preencha todos os campos.";
            exit;
        }

        
        $stmt = $pdo->prepare("SELECT senha FROM cliente WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch();

            
            if (password_verify($senha_atual, $usuario['senha'])) {
                
                $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

                
                $Stmt = $pdo->prepare("UPDATE cliente SET senha = :nova_senha WHERE email = :email");
                $Stmt->bindParam(':nova_senha', $nova_senha_hash);
                $Stmt->bindParam(':email', $email);

                if ($Stmt->execute()) {
                    echo "Senha atualizada com sucesso!";
                } else {
                    echo "Erro ao atualizar a senha. Tente novamente.";
                }
            } else {
                echo "A senha atual está incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    }
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/usuario-alterarsenha.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.19/inputmask.min.js"></script>
    <title>Configurações da Conta</title>
</head>
<body>
    <?php
    session_start();
    ?>
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
        <div id="logo"><a href="../homepage.php"><img src="../assets/imgs/logo.jpg" alt="Logo Promel"></a></div>
        <div id="user_menu">
            <div class="icone title"><img src="../assets/imgs/icons/Group.svg" style="margin-right: 10px;">Minha Conta</div>
            <div id="user_pages">
                <div class="linha"><div class="seta"></div><a class="botao" href="./perfil.php"><p>Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao pagatual" href="./alterarsenha.php"><p>Trocar Senha</p></a></div>
            </div>
            <div id="sair"><a href="../config/logout.php"><img src="../assets/imgs/icons/logoutbranco.svg"><p>Sair</p></a></div>
        </div>
    </nav>

    <div class="container">
        <div class="quadrado">
            <h3 id="title" class="my-md-5">Alterar Senha</h3>

            <form id="formcad" enctype="multipart/form-data" class="row" method="POST">
                <div class="image">
                    <img src="../uploads/<?=$_SESSION["idusuario"];?>.jpeg">
                </div>
                <div class="col-12 mt-3">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Confirme seu Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha antiga</label>
                        <input type="password" class="form-control" id="senha_atual" name="senha_atual" placeholder="Insira sua senha antiga" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha Nova</label>
                        <input type="password" class="form-control" id="nova_senha" name="nova_senha" placeholder="Insira sua nova senha" required>
                    </div>
                </div>

                <!-- Submit -->
                <div class="mb-3">
                    <button type="submit" id="submit" class="btn btn-primary mt-3">Confirmar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        
        Inputmask({
            alias: "email"
        }).mask("#email");

        
        Inputmask({
            regex: "[A-Za-z0-9]{8,20}"
        }).mask("#password");

        Inputmask({
            regex: "[A-Za-z0-9]{8,20}"
        }).mask("#senha");

        Inputmask({
            regex: "[A-Za-z0-9]{8,20}"
        }).mask("#confirmsenha");

        
        const inputs = document.querySelectorAll("input, textarea");
        inputs.forEach(input => {
            input.addEventListener("input", () => {
                resetarMensagem();
            });
        });
    </script>
    <script src="../assets/js/mobileNavbar.js"></script>
</body>
</html>
