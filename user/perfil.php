<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/nav.css" rel="stylesheet">
    <link href="../assets/css/usuario-perfil.css" rel="stylesheet">
    <title>Configurações da Conta</title>
</head>
<body>
<?php
    session_start();
    require_once '../connection/connection.php';
    extract($_GET);
    if (isset($_SESSION["loggedin"])) {
        $sql = 'SELECT * FROM cliente WHERE cliente_ID = :cliente_ID';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cliente_ID', $_SESSION["idusuario"]);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $lista = $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            $lista = [];
        }
    
        foreach($lista as $usuario) { ?>
            <nav id="mobileNavbar">
                <div class="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>

            <nav id="navbar">
                <div id="logo"><a href="../homepage.php"><img src="../assets/imgs/logo.jpg" alt="Logo Promel"></a></div>
                <div id="user_menu">
                    <div class="icone title"><img src="../assets/imgs/icons/Group.svg" style="margin-right: 10px;">Minha Conta</div>
                    <div id="user_pages">
                        <div class="linha"><div class="seta"></div><a class="botao pagatual" href="./perfil.php"><p>Perfil</p></a></div>
                        <!-- <div class="linha"><div class="seta"></div><a class="botao" href="./endereco.php"><p>Endereço</p></a></div> -->
                        <div class="linha"><div class="seta"></div><a class="botao" href="./alterarsenha.php"><p>Trocar Senha</p></a></div>
                        <!-- <div class="linha"><div class="seta"></div><a class="botao" href="./historico.php"><p>Histórico</p></a></div> -->
                    </div>
                    <div id="sair"><a href="../config/logout.php"><img src="../assets/imgs/icons/logoutbranco.svg"><p>Sair</p></a></div>
                    </div>
            </nav>

            <div class="container">
                <h3 id="title" class="my-md-5">Configurações da Conta</h3>
                <div id="messageContainer"></div>
                <form enctype="multipart/form-data" class="row" method="POST">
                    <div class="col-md-7 col-sm-12 mt-3">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?=$usuario->Nome;?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?=$usuario->Email;?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="telefone" name="telefone" value="<?=$usuario->Telefone;?>" maxlength="11">
                        </div>
                    </div>

                    <div id="img_perfil" class="col-md-4 col-sm-12 mb-5">
                        <label for="fotoperfil">
                            <img src="../uploads/<?=$_SESSION["idusuario"];?>.jpeg" alt="Imagem de perfil" id="imgperfil">
                        </label>
                        <input type="file" id="fotoperfil" name="fotoperfil" class="d-none">
                        <button type="button" id="inputFile">Escolher imagem</button>
                    </div>

                    <div class="mb-3">
                        <label for="another_info" class="form-label">Outras Informações</label>
                        <textarea id="another_info" class="form-control" name="info" rows="3" style="resize: none;"><?=$usuario->Info;?></textarea>
                    </div>

                    <div class="mb-3">
                        <button type="submit" id="submit" class="btn btn-primary mt-3">Salvar todas as alterações</button>
                    </div>
                </form>
            </div>
        <?php
        }
    } else {
        header("Location: ../login.php");
        exit();
    }
    ?>
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

    const button = document.getElementById("inputFile");
    const inputFile = document.querySelector("[type=file]");
    button.addEventListener("click", () => {
        // Simula um clique no input file
        inputFile.click()
        resetarMensagem();
    })

    fotoperfil.onchange = event => {
        const [file] = fotoperfil.files;
        if (file) {
            if (file.size > maxFileSize) {
                messageContainer.classList.add("alert-warning");
                messageContainer.innerHTML = "A imagem é muito grande. O tamanho máximo permitido é de 2MB.";
                imgperfil.src="../uploads/<?=$_SESSION["idusuario"];?>.jpeg"; // Limpa a imagem
                document.getElementById("submit").style.display = "none"
            } else {
                imgperfil.src = URL.createObjectURL(file);
                document.getElementById("submit").style.display = "block"
            }
        }
    };


    /* 
    
        const request = new XMLHttpRequest();

        request.onreadystatechange = () => {
            if(request.readyState == 4 && request.status == 200){
                JSON.parse(request.response)
            }
        }

        request.open("post", "url");
        request.setRequestHeader("Content-type", "application/json"); Caso eu queria mandar um json
        request.send(body)

    */

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
