<?php
require_once "./connection/connection.php";
session_start();
include "header.php";

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
                    
                        <!-- colocar : <a href="https://wa.me/5515996810765?text=Olá, estou interessado no produto <?= urlencode($produto->Nome_produto) ?>" class="buttoncoisa btn btn-success flex-fill" target="_blank">
                                    Nome
                                </a>
                        ou parecido com isso pra que na mensagem mostre todos os produtos do carrinho ou só os selecionados -->
                        <button class="btn btn-success">Continuar</button> 
                    </td>
                </tr>
            </tfoot>
        </table>
        
    </div>
</body>
</html>