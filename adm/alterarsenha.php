<?php
session_start();
if (isset($_SESSION["adm"])) {
?>
<?php
require_once '../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se o usuário está autenticado
    if (!isset($_SESSION['idusuario'])) {
        echo json_encode(['status' => 'error', 'message' => 'Usuário não autenticado.']);
        exit;
    }

    // Obtenha o ID do usuário da sessão
    $idusuario = $_SESSION['idusuario'];

    // Obtenha os valores do formulário
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirmsenha'];

    // Verifique se as novas senhas coincidem
    if ($nova_senha !== $confirma_senha) {
        echo "<script> 
            alert('As senhas não coincidem');
            window.location.href = 'alterarsenha.php'
        </script>;";  
        exit;
    }

    // Busque a senha atual do usuário
    $sql = "SELECT Senha FROM cliente WHERE cliente_ID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $idusuario);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    $senha_hash = $result->Senha;

    // Verifique se a senha atual está correta
    if (!password_verify($senha_atual, $senha_hash)) {
        echo "<script> 
            alert('Senha atual incorreta');
            window.location.href = 'alterarsenha.php'
        </script>;";  
        exit;
    }

    // Gere o hash da nova senha
    $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

    // Atualize a senha no banco de dados
    $sql = "UPDATE cliente SET Senha = :senha WHERE cliente_ID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':senha', $nova_senha_hash);
    $stmt->bindParam(':id', $idusuario);

    if ($stmt->execute()) {
        echo "<script> 
            alert('Senha alterada com sucesso!');
            window.location.href = 'perfil.php'
        </script>;";   
    } 
    else {
        echo "<script> 
            alert('Erro ao atualizar senha');
            window.location.href = 'alterarsenha.php'
        </script>;";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/alterarsenha.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.19/inputmask.min.js"></script>
    <title>Configurações da Conta</title>
</head>
<body>
    <?php include "navbar.php"; ?>
    <script>
    const paginas = document.querySelectorAll('.botao');
    paginas[1].classList.add('pagatual');
    </script>
    <div class="container">
        <div class="quadrado">
            <h3 id="title" class="my-md-5">Alterar Senha</h3>

            <form id="formcad" action="" enctype="multipart/form-data"  method="POST">
                <div class="col-12 mt-3">
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha Atual</label>
                        <input type="password" class="form-control" id="senha_atual" name="senha_atual" placeholder="Insira sua senha antiga" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha Nova</label>
                        <input type="password" class="form-control" id="nova_senha" name="nova_senha" placeholder="Insira sua nova senha" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmsenha" class="form-label">Confirmar senha</label>
                        <input type="password" class="form-control" id="confirmsenha" name="confirmsenha" placeholder="Confirme sua senha" required>
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
        const inputs = document.querySelectorAll("input, textarea");
        inputs.forEach(input => {
            input.addEventListener("input", () => {
                resetarMensagem();
            });
        });
    </script>
    <script src="../assets/js/mobileNavbar.js"></script>
</body>
<?php
 }
else {

        header("Location: ../login.php");
        exit();
    }
?>
</html>
