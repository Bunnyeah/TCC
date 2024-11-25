<?php
require_once "./connection/connection.php";
$sqlListarProdutos = "SELECT * FROM produto";
$stmt = $conn->query($sqlListarProdutos);
$produtos = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300..900&family=Roboto+Serif:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Home Page</title>
</head>
<body>
    <?php include "header.php"; ?>

    <!-- Carrossel -->
    <div id="carouselExample" class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/imgs/decorativo/1.png" alt="Banner 1">
            </div>
        </div>
        
    </div>

    <!-- Categorias -->
    <section class="categorias active">
        <?php 
        $sqlSelectCategorias = 'SELECT * FROM categoria';
        $stmt = $conn->query($sqlSelectCategorias);
        $categorias = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach($categorias as $categoria){
        ?>
        <div class="categoria">
            <p><?=$categoria->Nome;?></p>
            <div class="categoria-linha destaque-amarelo"></div>
        </div>
        <?php }; ?>
    </section>
    <div class="navigation-buttons">
        <button class="arrow-prev">◀</button>
        <button class="arrow-next">▶</button>
    </div>


    <script>
        const items = document.querySelectorAll('.categoria');
        let bloco = [];
        let currentSection = document.querySelector('.categorias');

        // Adiciona seções dinamicamente
        items.forEach((item, index) => {
            bloco.push(item);
            currentSection.appendChild(item);

            if ((index + 1) % 3 === 0) { // Quando atingir 3 elementos
                bloco = [];
                currentSection = document.createElement('section');
                currentSection.className = 'categorias';
                currentSection.style.transform = 'translateX(100%)';
                document.body.appendChild(currentSection);
            }
        });

        const sections = document.querySelectorAll('.categorias'); // Seleciona todas as seções
        const prevButton = document.querySelector('.arrow-prev'); // Botão para trás
        const nextButton = document.querySelector('.arrow-next'); // Botão para frente
        let currentIndex = 0; // Índice da seção visível

        function updateNavigationButtons() {
            // Desabilita os botões se não houver mais seções para navegar
            prevButton.disabled = currentIndex === 0;
            nextButton.disabled = currentIndex === sections.length - 1;
        }

        function navigateToSection(direction) {
            // Remove a classe ativa da seção atual
            sections[currentIndex].classList.remove('active');

    // Aplica a transformação para sair da tela
        if (direction === 'next') {
            sections[currentIndex].style.transform = 'translateX(-100%)'; // Sai para a esquerda
            currentIndex++;
            sections[currentIndex].style.transform = 'translateX(100%)'; // Prepara para entrar da direita
        } else if (direction === 'prev') {
            sections[currentIndex].style.transform = 'translateX(100%)'; // Sai para a direita
            currentIndex--;
            sections[currentIndex].style.transform = 'translateX(-100%)'; // Prepara para entrar da esquerda
        }

        // Adiciona a classe ativa à nova seção
        sections[currentIndex].classList.add('active');
        sections[currentIndex].style.transform = 'translateX(0)'; // Entra no centro

        updateNavigationButtons(); // Atualiza os estados dos botões
        }

        // Inicialização
        updateNavigationButtons();

        // Eventos dos botões
        nextButton.addEventListener('click', () => navigateToSection('next'));
        prevButton.addEventListener('click', () => navigateToSection('prev'));
    </script>

    <!-- Produtos Mais Populares -->
    <section class="produtos-populares">
        <h2 class="titulo-populares">Mais Populares</h2>
        <div class="lista-produtos">
            <?php foreach ($produtos as $produto): ?>
                <div class="produto-card">
                    <img src="assets/imgs/produtos/<?= $produto->imagem; ?>" alt="<?= $produto->Nome_produto; ?>">
                    <div class="produto-detalhes">
                        <p class="produto-preco">R$<?= number_format($produto->Preco_Und, 2, ',', '.'); ?></p>
                        <p class="produto-nome"><?= $produto->Nome_produto; ?></p>
                    </div>
                    <a href="./info_produto.php?id=<?= $produto->produto_ID; ?>" class="btn-comprar">Comprar</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>
</html>
