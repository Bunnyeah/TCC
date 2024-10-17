<?php 
require_once '../connection/connection.php';

// Captura o status enviado via GET, se existir
$status = isset($_GET['Status']) ? $_GET['Status'] : '';

// Consulta SQL com base no status, se for enviado
if ($status !== '') {
    $sql = "SELECT * FROM produto WHERE `Status` = :Status";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":Status", $status);
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_OBJ);
    
} else {
    // Se não houver status, busca todos os produtos
    $sql = "SELECT * FROM produto";
    $stmt = $conn->query($sql);
    $produtos = $stmt->fetchAll(PDO::FETCH_OBJ);
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Configurações da Conta - Histórico de Compras">
    <meta name="keywords" content="conta, histórico, compras">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/user/historico.css" rel="stylesheet">
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
                <div class="linha"><div class="seta"></div><a class="botao" href="perfil.php"><p>Perfil</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="endereco.php"><p>Endereço</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao" href="alterarsenha.php"><p>Trocar Senha</p></a></div>
                <div class="linha"><div class="seta"></div><a class="botao pagatual" href="./historico.php"><p>Histórico</p></a></div>
            </div>
            <div id="sair"><a href="./config/logout.php"><p>Sair</p></a></div>
        </div>
    </nav>

    <!-- Titulo -->
    <div id="containertotal">
        <h3 id="Title" class="my-md-5">Meu Histórico</h3>
    
    <!-- botoes -->
    <div id="botoes">
    <form id="formProduto" action="historico.php" method="GET"> <!-- ver se ta na posição certa, talvez de erro no futuro -->
        <button class="button" type="submit" name="Status" value="">Tudo</button>
        <button class="button" type="submit" name="Status" value="A Caminho">A Caminho</button>
        <button class="button" type="submit" name="Status" value="Entregue">Entregue</button>
        <button class="button" type="submit" name="Status" value="Cancelado">Cancelado</button>
    </div>

    <!-- barra de pesquisa -->
    <div id="barra_pesquisa">
        <input type="search" placeholder="Procurar produtos..." id="text_buscar">
    </div>

    <div id="all_produts">

    <!-- TUDO -->
    <?php foreach ($produtos as $produto){ ?>
        <div id="produto">
            <div id="sep_cima">            
                <img src="../assets/imgs/icons/caminhao_entrega.svg"><p>Seu pedido [saindo do comércio]</p>
                <p><?= $produto->Status?></p>
            </div>

            <div id="all_info">
                <div id="img_prodt_div" class="col-4">
                    <img id="img_prodt" src="../assets/imgs/produtos/WhatsApp Image 2024-03-20 at 15.38.44.jpeg">
                </div>

                <div id="info_prodt" class="col-8">
                    <div class="col-6">
                        <p id="txt"><?= $produto->Nome_produto?></p>
                        <p><?= $produto->Qtd_Und?> Unidades</p>
                    </div>
                    <div class="col-6" id="div_valor"><p id="txt"><p>R$ <?= number_format(floatval($produto->Preco_Und), 2, ',', '.') ?></p>
                    </div>
                </div>

            </div>
            <div id="sep_baixo">
                <button type="submit">Pedido Recebido</button>
                <button type="submit">Não recebi meu pedido</button>
                <p>Total do Pedido: R$ <?= number_format(floatval($produto->Preco_Und) * floatval($produto->Qtd_Und), 2, ',', '.') ?></p>
                </div>
        </div>

    <?php
        }
    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="../assets/js/mobileNavbar.js"></script>
</body>
</html>
