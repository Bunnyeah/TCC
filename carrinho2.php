<?php
require_once "./connection/connection.php";

// Consulta SQL para listar as informações
include "header.php";
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
    <link rel="stylesheet" href="./assets/css/carrinho.css">
</head>
<body>
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
                    <span class="total-price">Total: R$ 10,00</span>

                    <button>Continuar</button>
                </td>
            </tr>
        </tfoot>
        </table>
    </div>
</body>
</html>
                    