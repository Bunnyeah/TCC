<?php
require_once "./connection/connection.php";

// Categoria enviada via POST
$categoria = $_POST['categoria'] ?? 'todos';

// Consulta ao banco de dados
if ($categoria === 'todos') {
    $sql = "SELECT * FROM produto";
} else {
    $sql = "SELECT * FROM produto WHERE fk_categoria_ID = :categoria";
}

$stmt = $conn->prepare($sql);
if ($categoria !== 'todos') {
    $stmt->bindParam(':categoria', $categoria);
}
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_OBJ);

// Geração do HTML dos produtos
?>
<h2 class="titulo-populares">Produtos</h2>
<div class="lista-produtos">
<?php foreach ($produtos as $produto): ?>
    <div class="produto-card">
        <img src="assets/imgs/produtos/<?= $produto->imagem; ?>" alt="<?= $produto->Nome_produto; ?>">
        <div class="produto-detalhes">
            <p class="produto-preco">R$<?= number_format($produto->Preco_Und, 2, ',', '.'); ?></p>
            <p class="produto-nome"><?= $produto->Nome_produto; ?></p>
        </div>            
        <div class="div_botao"><a href="./info_produto.php?id=<?= $produto->produto_ID; ?>" class="btn-comprar">Comprar</a></div> 
    </div>
</div>
    </div>
<?php endforeach; ?>
