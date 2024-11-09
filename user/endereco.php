<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/usuario-endereco.css" rel="stylesheet">
    <link href="../assets/css/nav.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.7-beta.19/inputmask.min.js"></script>
    <title>Configurações da Conta</title>
</head>
<body>
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
                <div class="linha"><div class="seta"></div><a class="botao pagatual" href="./endereco.php"><p>Endereço</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="./alterarsenha.php"><p>Trocar Senha</p></a></div>
            </div>
            <div id="sair"><a href="../config/logout.php"><img src="../assets/imgs/icons/logoutbranco.svg"><p>Sair</p></a></div>
        </div>
    </nav>

    <div class="container">
        <div class="quadrado">
            <h3 id="title" class="my-md-5">Endereços</h3>

            <div class="mb-3">
                <button class="button btn btn-primary mt-3" id="addendereco" onclick="novoendereco()">Inserir Novo endereço</button>
            </div>

            <!-- Inicio do formulario -->
            <form id="dados" method="get" action="" style="display: none;">
                <label for="cep" class="form-label">Insira seu CEP</label>
                <input name="cep" type="text" class="form-control" id="cep" value="" maxlength="9"/><br/>
                <div id="retornodados" style="display: none;">
                    <label class="form-label">Estado:
                    <input name="uf" type="text" class="form-control" id="uf" readonly/></label><br/>
                    <label class="form-label">Cidade:
                    <input name="cidade" type="text" class="form-control" id="cidade" readonly/></label><br/>
                    <label class="form-label">Rua:
                    <input name="rua" type="text" class="form-control" id="rua" readonly/></label><br/>
                    <label class="form-label">Bairro:
                    <input name="bairro" type="text" class="form-control" id="bairro" readonly/></label><br/>
                </div>
                <button type="button" id="verifendereco" class="button" onclick="pesquisacep()" style="display: block;">Verificar Endereço</button>
                <button type="submit" id="submit" style="display: none;">Salvar</button>
            </form>
        </div>
    </div>

    <script src="../assets/js/cepSearch.js"></script>
    <script src="../assets/js/mobileNavbar.js"></script>
    <script>
        
        Inputmask("99999-999").mask("#cep");

        
        function novoendereco() {
            document.getElementById("dados").style.display = "block";
        }

        
        function pesquisacep() {
            const cep = document.getElementById("cep").value.replace("-", "");
            if (cep.length === 8) {
                
                document.getElementById("retornodados").style.display = "block";
                document.getElementById("submit").style.display = "inline";
            } else {
                alert("Insira um CEP válido com 8 dígitos.");
            }
        }
    </script>
</body>
</html>
