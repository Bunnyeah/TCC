<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/adm/produtos.css">
    <link rel="stylesheet" href="../assets/css/nav.css">
    <title>Produtos</title>
</head>
<body>
    <!-- Formulário de Adição -->
    <div id="addproduto">
        <a class="close" id="close">X</a>
        <form enctype="multipart/form-data" action="../config/cadproduto.php" id="formaddproduto" method="POST">
            <div class="inputs">
                <input class="form-control" type="text" id="nome_produto_add" name="Nome_produto" placeholder="Nome do produto" required autocomplete="off"><br>
                <!-- Máscara simples para moeda e estoque -->
                <input class="form-control" type="text" id="preco_und_add" name="Preco_Und" placeholder="Preço Unitário" required oninput="formatCurrency(this)"><br>
                <input class="form-control" type="text" id="qtd_stock_add" name="Qtd_stock" placeholder="Quantidade em estoque" required oninput="formatInteger(this)"><br>
                <textarea class="form-control" id="descricao_add" name="Descricao" placeholder="Descrição" style="resize: none;" required></textarea><br>
                <button type="submit" class="submit">Salvar</button>
            </div>
        </form>
    </div>

    <!-- Funções JavaScript Simplificadas -->
    <script>
        function formatCurrency(input) {
            
            let value = input.value.replace(/\D/g, "");

            
            input.value = "R$ " + (value / 100).toFixed(2).replace(".", ",");
        }

        function formatInteger(input) {
            
            input.value = input.value.replace(/\D/g, "");
        }
    </script>

    <script src="../assets/js/produto.js"></script>
    <script src="../assets/js/mobileNavbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
