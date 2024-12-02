<?php
require_once "./connection/connection.php";
session_start();
include "header.php";

if (isset($_SESSION["loggedin"])) {

    // Verificar se há remoção de item no carrinho
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

    // Calcular o valor total do carrinho
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
        <h1>Seu Carrinho</h1>
        <table>
            <thead class="thead">
                <tr>
                    <th>Produtos</th>
                    <th>Preço Unitário</th>
                    <th>Quantidade</th>
                    <th>Valor Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php if (!empty($_SESSION['carrinho'])) : ?>
                    <?php foreach ($_SESSION['carrinho'] as $pp) : ?>
                        <tr>
                            <td class="product" data-label="Produto">
                                <img src="./assets/imgs/produtos/<?= $pp['imagem']; ?>" alt="<?= $pp['nome']; ?>">
                                <div class="product-details">
                                    <h5><?= $pp['nome'] ?></h5>
                                </div>
                            </td>
                            <td data-label="Preço Unitário">R$ <?= number_format($pp['preco'], 2, ',', '.'); ?></td>
                            <td data-label="Quantidade"><?= $pp['quantidade']; ?></td>
                            <td data-label="Valor Total">R$ <?= number_format($pp['preco'] * $pp['quantidade'], 2, ',', '.'); ?></td>
                            <td data-label="Ações">
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $pp['id']; ?>">
                                    <button type="submit" name="remover_item" class="btn btn-danger btn-sm">Remover</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">Nenhum pedido encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="select-all"></td>
                    <td class="actions-footer" colspan="4">
                        <span class="total-price">Total: R$ <?= number_format($valorTotal, 2, ',', '.') ?></span>
                        <?php
                        if (!empty($_SESSION['carrinho'])) {
                            try {
                                $conn->beginTransaction();

                                foreach ($_SESSION['carrinho'] as $pp) {
                                    $novoEstoque = $pp['estoque'] - $pp['quantidade'];
                                    if ($novoEstoque < 0) {
                                        throw new Exception("Estoque insuficiente para o produto: " . $pp['nome']);
                                    }

                                    $sql = "UPDATE produto 
                                            SET Qtd_stock = :new_stock 
                                            WHERE produto_ID = :produto_ID";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute([
                                        ':new_stock' => $novoEstoque,
                                        ':produto_ID' => $pp['id']
                                    ]);
                                }

                                $conn->commit();

                                // Gera o link do WhatsApp
                                $mensagem = rawurlencode(
                                    "Olá! Aqui estão os detalhes do seu carrinho de compras:\n\n\n" .
                                    implode("\n", array_map(function ($pp) {
                                        return "Produto: {$pp['nome']}\n" .
                                               "Preço: R$ " . number_format($pp['preco'], 2, ',', '.') . "\n" .
                                               "Quantidade: {$pp['quantidade']}\n" .
                                               "Subtotal: R$ " . number_format($pp['preco'] * $pp['quantidade'], 2, ',', '.') . "\n";
                                    }, $_SESSION['carrinho'])) .
                                    "\n\nValor Total: R$ " . number_format($valorTotal, 2, ',', '.') .
                                    "\n\nCaso queira confirmar a compra ou adicionar mais itens, responda a esta mensagem!"
                                );

                                echo '<a href="https://wa.me/5515996810765?text=' . $mensagem . '" class="btn btn-success" target="_blank">
                                        Continuar
                                      </a>';
                            } catch (Exception $e) {
                                $conn->rollBack();
                                echo "<p class='error'>Erro: " . $e->getMessage() . "</p>";
                            }
                        } else {
                            echo '<p>Seu carrinho está vazio. Adicione produtos antes de continuar!</p>';
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