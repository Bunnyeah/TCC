<!--     
    $sql = "UPDATE produto 
    SET
    Qtd_stock = :new_stock
    WHERE produto_ID = :produto_ID"; 
 -->

 <?php
require_once "./connection/connection.php";
session_start();
include "header.php";
if (isset($_SESSION["loggedin"])) {
// var_dump($_SESSION['carrinho']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remover_item'])) {
    $idRemover = $_POST['id'];
    foreach ($_SESSION['carrinho'] as $index => $item) {
        if ($item['id'] == $idRemover) {
            unset($_SESSION['carrinho'][$index]);
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // Reindexa o array
            break;
        }
    }
}

$valorTotal = 0;
if (!empty($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $valorTotal += $item['preco'] * $item['quantidade'];
    }
}
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

                <?php if (!empty($_SESSION['carrinho'])) : ?>
                    <?php foreach ($_SESSION['carrinho'] as $pp) : ?>
                        <tr class="tbody">
                            <td class="product" id="img_name">
                            <img src="./assets/imgs/produtos/<?= $pp['imagem'];?>" alt="<?= $pp['nome'];?>"></img>
                                    <div class="product-details">
                                        <h5><?= $pp['nome'] ?></h5>
                                    </div>
                            </td>
                            <td>R$ <?= number_format($pp['preco'], 2, ',', '.');?></td>
                            <td><?= $pp['quantidade'];?></td>
                            <td>R$ <?= number_format($pp['preco'] * $pp['quantidade'], 2, ',', '.');?></td>

                            <td>
                            <!-- Botão para remover o item -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $pp['id'];?>">
                                <button type="submit" name="remover_item" class="btn btn-danger btn-sm">Remover</button>
                            </form>
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
                    <td class="select-all"></td>
                    <td class="actions-footer" colspan="4">
                        <span class="total-price">Total: R$ <?= number_format($valorTotal, 2, ',', '.') ?></span>
                        <?php
// Verifica se o carrinho está vazio
if (empty($_SESSION['carrinho'])) {
    echo '<p>Seu carrinho está vazio. Adicione produtos antes de continuar!</p>';
} else {
    // Gera o link do WhatsApp com os dados do carrinho
    $mensagem = rawurlencode(
        "Olá! Aqui estão os detalhes do seu carrinho de compras:\n\n\n" . 
        implode("\n", array_map(function($pp) {
            return "Produto: {$pp['nome']}\n" .
                   "Preço: R$ " . number_format($pp['preco'], 2, ',', '.') . "\n" .
                   "Quantidade: {$pp['quantidade']}\n" .
                   "Subtotal: R$ " . number_format($pp['preco'] * $pp['quantidade'], 2, ',', '.'). "\n"; 
        }, $_SESSION['carrinho'])) . 
        "\n\nValor Total: R$ " . number_format(array_reduce($_SESSION['carrinho'], function($total, $item) {
            return $total + ($item['preco'] * $item['quantidade']);
        }, 0), 2, ',', '.') . 
        "\n\nCaso queira confirmar a compra ou adicionar mais itens, responda a esta mensagem!"
    );

    echo '<a href="https://wa.me/5515996810765?text=' . $mensagem . '" class="btn btn-success" target="_blank">
            Continuar
          </a>';
}
?>
                    </td>
                </tr>
            </tfoot>
        </table>

    </div>
    <?php
    } else {
        header("Location: ./adm/perfil.php");
        exit();
    }
    ?>
</body>
</html>