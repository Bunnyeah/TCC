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
    <?php 
    session_start();
    include "header.php"; 
    ?>

    <!-- Carrossel -->
    <div id="carouselExample" class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/imgs/decorativo/1.png" alt="Banner 1">
            </div>
        </div>
        
    </div>

    <!-- Categorias -->
    <div class="categorias-wrapper">
    <section class="categorias active">
        <?php 
        $sqlSelectCategorias = 'SELECT * FROM categoria';
        $stmt = $conn->query($sqlSelectCategorias);
        $categorias = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach($categorias as $categoria){
        ?>
        <div class="categoria" data-categoria="<?= $categoria->categoria_ID; ?>">
            <p><?=$categoria->Nome;?></p>
            <div class="categoria-linha destaque-amarelo"></div>
        </div>
        <?php }; ?>
    </section>
    <div class="navigation-buttons">
        <button class="arrow-prev"><img src="./assets/imgs/icons/setaesquerda"></button>
        <button class="arrow-next"><img src="./assets/imgs/icons/setadireita"></button>
    </div>
</div>

    <!-- Setas -->

<script>
    const items = document.querySelectorAll('.categoria');
let bloco = [];
let currentSection = document.querySelector('.categorias'); // Mantém a referência à primeira seção
const wrapper = document.querySelector('.categorias-wrapper'); // Referência ao wrapper

// Determina o número de categorias por linha com base no tamanho da tela
function getItemsPerRow() {
    return window.innerWidth < 768 ? 2 : 3; // 2 itens por linha em telas menores que 768px, 3 itens em telas maiores
}

// Adiciona seções dinamicamente
items.forEach((item, index) => {
    bloco.push(item);
    currentSection.appendChild(item);

    if ((index + 1) % getItemsPerRow() === 0) { // Altera a verificação para o número dinâmico de itens por linha
        bloco = [];
        currentSection = document.createElement('section');
        currentSection.className = 'categorias';
        currentSection.style.transform = 'translateX(100%)';
        wrapper.appendChild(currentSection); // Adiciona a nova seção dentro do wrapper
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

document.querySelectorAll('.categoria').forEach(botao => {
    botao.addEventListener('click', () => {
        const categoria = botao.getAttribute('data-categoria');

        fetch('select-produtos.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `categoria=${encodeURIComponent(categoria)}`
        })
        .then(response => response.text())
        .then(data => {
            // Atualizar apenas o conteúdo da lista de produtos
            document.getElementById('produtos-populares').innerHTML = data;
        })
        .catch(error => console.error('Erro:', error));
    });
});

    </script>

    <!-- Produtos Mais Populares -->
    <section id="produtos-populares">
        <?php include 'select-produtos.php' ?>
    </section>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Video Tik Tok -->
            <div class="col-6" id="video">
                <a href=""><video src=""></video></a>
              <a href="https://www.tiktok.com/@promel_alex?_t=8rfkLdLY46J&_r=1"><video src=""></video></a>
            </div>
            
            <!-- informações sobre oq é a categoria e seus beneficios -->
            <div class="col-6" id="txt">
                <p></p>
            </div>
        </div>
    </div>

        <!-- Localização do Estabelecimento Físico -->
        <div class="endereco-container">
          <div id="endereco-image">
            <div id="local"><img src="./assets/imgs/icons/location.svg"></div>
          </div>
          <div class="endereco-items">
            <span>Endereço: Rua Coronel Arruda Botelho,291 - Centro Boituva - SP,18550-000</span>
            <span>Telefone: (15)3316-5606</span>
            <span>Horario de Funcionamento: Aberto as 08:00 Fecha as 19:00</span>
          </div>
          <div id="div_img">
            <a href="https://www.google.com/maps/place/Promel+Boituva/@-23.2851232,-47.6765076,21z/data=!4m10!1m2!2m1!1spromel+produtos+naturais+boituva!3m6!1s0x94c5e3ffc55afc99:0x8ea05c5b0d523b8b!8m2!3d-23.2851231!4d-47.6762261!15sCiBwcm9tZWwgcHJvZHV0b3MgbmF0dXJhaXMgYm9pdHV2YVoiIiBwcm9tZWwgcHJvZHV0b3MgbmF0dXJhaXMgYm9pdHV2YZIBEWhlYWx0aF9mb29kX3N0b3Jl4AEA!16s%2Fg%2F11y3sj6rjd?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoASAFQAw%3D%3D"><img src="./assets/imgs/decorativo/maps_home.png" alt="Localização"></a>
          </div>
        </div>

    <?php include "footer.php"; ?>
</body>
</html>
