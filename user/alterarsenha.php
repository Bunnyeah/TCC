<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/usuario-alterarsenha.css" rel="stylesheet">
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
                <div class="linha"><div class="seta"></div><a class="botao" href="./endereco.php"><p>Endereço</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao pagatual" href="./alterarsenha.php"><p>Trocar Senha</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="./historico.php"><p>Histórico</p></a></div>
            </div>
            <div id="sair"><a href="../config/logout.php"><p>Sair</p></a></div>
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
                                <input type="email" class="form-control" id="email" name="email" placeholder="Confirme seu Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="Senha antiga" class="form-label">Senha antiga</label>
                                <input type="password" class="form-control" id="password" name="oldpassword" placeholder="insira seu email" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha nova" class="form-label" style="display: none">Senha Nova</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Insira sua senha" style="display: none" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label" style="display: none">Confirmar Senha</label>
                                <input type="password" class="form-control" id="confirmsenha" name="confirmsenha" placeholder="Confirme sua senha" style="display: none" required>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="mb-3">
                            <button type="submit" id="submit" class="btn btn-primary mt-3">Confirmar</button>
                        </div>
                    </form>
        </div>
    </div>

    
</body>
<script>
    const imgperfil = document.getElementById("imgperfil");
    const fotoperfil = document.getElementById("fotoperfil");
    const messageContainer = document.getElementById("messageContainer");
    const maxFileSize = 2 * 1024 * 1024; // 2 MB em bytes

    function resetarMensagem() {
        messageContainer.style.display = "block"; // Exibe o container
        messageContainer.className = "alert"; // Reseta classes
        messageContainer.innerHTML = ""; // Esvazia a mensagem
    }

    document.querySelector("form").onsubmit = function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        fetch('../config/update.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            resetarMensagem();
            if (data.success) {
                messageContainer.classList.add("alert-success");
                messageContainer.innerHTML = data.success;
            } else if (data.warning) {
                messageContainer.classList.add("alert-warning");
                messageContainer.innerHTML = data.warning;
                imgperfil.src="../uploads/<?=$_SESSION["idusuario"];?>.jpeg";
            } else if (data.error) {
                messageContainer.classList.add("alert-danger");
                messageContainer.innerHTML = data.error;
                imgperfil.src="../uploads/<?=$_SESSION["idusuario"];?>.jpeg";
            }
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    };

    const inputs = document.querySelectorAll("input, textarea");

    // Adiciona o event listener para todos os inputs
    inputs.forEach(input => {
        input.addEventListener("input", () => {
            resetarMensagem();
        });
    });
</script>
<script src="../assets/js/mobileNavbar.js"></script>
</html>
</html>