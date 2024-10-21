<?php
require_once "./connection/connection.php";

// Consulta SQL para listar as informações
session_start();
$sqlListarTudo = "SELECT 
produto.imagem, produto.Nome_Produto, produto.Preco_Und, pedido.Qtd_produtos, pedido.Valor_Total
        FROM Pedido
        INNER JOIN produto_pedido_possui ON pedido.pedido_ID = produto_pedido_possui.fk_pedido_ID
        INNER JOIN Produto ON produto_pedido_possui.fk_produto_ID = Produto.produto_ID
        INNER JOIN cliente ON pedido.fk_cliente_ID = cliente.cliente_ID
        WHERE cliente.cliente_ID = :cliente_ID"; 
$stmt = $conn->prepare($sqlListarTudo);
$stmt->bindParam(':cliente_ID', $_SESSION["idusuario"]);
$stmt->execute();

// Verificar se a consulta foi bem-sucedida
if ($stmt === false) {
    die("Erro na consulta: " . $conn->errorInfo());
}

// Listar os resultados
$PPs = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: left;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            padding:0 !important;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .thead {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }
        
        .thead th {
            padding-top: 15px;
            padding-bottom: 15px;
            text-align: left;
            font-weight: bold;
            color: #6c757d;
            margin-left: 5vh;
            margin-right: 5vh;
            justify-content: center;
        }
        #img_name,#price-place,#quantity-place{
            max-width: 20%;
            width: 20%;
        }
        .thead th{
            display: flex;
            width: 20%;
            max-width:20%;
        }

        tbody tr {
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            /* padding: 20px 0; */
        }

        tbody td {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
            width: 20%;
        }

        .product {
            display: flex;
            align-items: center;
            flex: 3;
        }

        .product img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 10px;
            border: 1px solid #dee2e6;
        }

        .product-details {
            display: flex;
            flex-direction: column;
        }

        .product-details h2 {
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
        }

        .product-details span {
            color: #6c757d;
            font-size: 14px;
        }

        .price, .quantity, .actions {
            flex: 1;
            text-align: center;
        }

        .price {
            font-size: 18px;
            color: #333;
        }

        .quantity {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .quantity input {
            width: 50px;
            height: 40px;
            text-align: center;
            font-size: 16px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }

        .quantity button {
            width: 40px;
            height: 40px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .quantity button:hover {
            background-color: #e2e6ea;
        }

        .actions button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: #dc3545;
        }

        .actions button:hover {
            color: #bd2130;
        }

        tfoot {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #fff;
            border-top: 1px solid #dee2e6;
        }

        tfoot .select-all label {
            display: flex;
            align-items: center;
            font-size: 16px;
            color: #6c757d;
        }

        tfoot .select-all input {
            margin-right: 10px;
        }

        tfoot .actions-footer {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex: 1;
        }

        tfoot .actions-footer .total-price {
            font-size: 18px;
            margin-right: 30px;
            color: #333;
        }

        tfoot .actions-footer button {
            padding: 1.5vh 3.5vh;
            background-color: #17a2b8;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            left: 80vw;
            position: absolute;
            display: flex;
        }

        tfoot .actions-footer button:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
        <!-- MENU -->
        <header>
        <nav id="menu">
            <a href="./homepage.php"><img src="./assets/imgs/logo/logo (2).jpg" alt="Logo Promel"></a>
            <!-- barra de pesquisa -->
            <div>
              <input id=text_buscar type="search" placeholder="Buscar...">
            </div>

            <!-- Cachoeira Conta -->
            <div class="header_conta">
              <ul>
                  <a><li><img src="./assets/imgs/icons/Group.svg" alt="conta" id="icone_menu2"></a>
  
                  <ul class="dropdown">
                    <a href="./login.php"><li><img src="./assets/imgs/icons/login.svg">Entrar/Login</li></a>
                    <a href="./"><li><img src="./assets/imgs/icons/fav_verde.svg">Meus Favoritos</li></a>
                    <a href=""><li><img src="./assets/imgs/icons/logout_verde.svg">Sair</li></a>
                  </ul>
              </li>
              </ul>
            </div>
            <!-- icone "carrinho" -->
                <a href="./carrinho2.php"><img src="./assets/imgs/icons/carrinho.svg" id="icone_menu"></a>
        </nav>
    </header>
    <div class="container">
        <table>
            <tbody>
                <tr class="thead">
                    <th>Produtos</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Valor Total</th>
                    <th>Ações</th>
                </tr>

                <?php if (!empty($PPs)) : ?>
                    <?php foreach ($PPs as $pp) : ?>
                        <tr class="tbody">
                            <td class="product" id="img_name">
                                <img src="./assets/imgs/produtos/<?php echo htmlspecialchars($pp->imagem); ?>" alt="Imagem do Produto">
                                    <div class="product-details">
                                        <h2><?php echo htmlspecialchars($pp->Nome_Produto); ?></h2>
                                    </div>
                            </td>
                            <td class="price" id="price-place"><?php echo number_format($pp->Preco_Und, 2, ',', '.'); ?> R$</td>
                            <td class="quantity" id="quantity-place"><?php echo htmlspecialchars($pp->Qtd_produtos)?></td>
                            <td class="price" id="price-place"><?php echo number_format($pp->Valor_Total, 2, ',', '.'); ?> R$</td>
                            <td class="actions">
                                <button method="DELETE">&#128465;</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4">Nenhum pedido encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
            <tr>
                <td class="select-all">
                    <!-- por enquanto, não ira ter o selecionar tudo -->
                    <!-- <label><input type="checkbox">Selecionar Tudo (0)</label> -->
                </td>
                <td class="actions-footer" colspan="3">
                    <span class="total-price">Total: R$ 0,00</span>

                    <button>Continuar</button>
                </td>
            </tr>
        </tfoot>
        </table>
    </div>
</body>
</html>
                    