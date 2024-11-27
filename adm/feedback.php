<?php
require_once '../connection/connection.php';

if (isset($_POST['excluir_feedback'])) {
    $id = $_POST['id'];  
    $sqlDelete = "DELETE FROM feedback WHERE ID_feedback = ?";
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->execute([$id]);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar as Avaliacoes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../assets/css/nav.css" rel="stylesheet">
    <link href="../assets/css/adm/feedback.css" rel="stylesheet">
    <link href="../assets/css/info_produto.css" rel="stylesheet">

</head>

<body>
<div id="messageContainer"></div>
        <!-- Navbar Mobile -->
        <?php include "navbar.php"?>
        
        <script>
            const paginas = document.querySelectorAll('.botao');
            paginas[2].classList.add('pagatual');
        </script>

        <!-- Titulo -->
        <div id="containertotal">
            <h3 id="Title" class="my-md-5">Feedbacks</h3>

            <div class="container">
                    <div>
                        <?php
                            $query_avaliacoes = "SELECT id_avaliacao, qtd_estrela, comentario 
                                                FROM avaliacoes
                                                ORDER BY id_avaliacao DESC";

                            $result_avaliacoes = $conn->prepare($query_avaliacoes);
                            $result_avaliacoes->execute();

                            while ($row_avaliacao = $result_avaliacoes->fetch(PDO::FETCH_ASSOC)) {
                                extract($row_avaliacao);
                            ?>
                            <p>Avaliação: <?=$id_avaliacao?></p>

                            <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $qtd_estrela) {
                                        echo '<i class="estrela-preenchida fa-solid fa-star"></i>';
                                    } else {
                                        echo '<i class="estrela-vazia fa-solid fa-star"></i>';
                                    }
                                }
                                ?>
                                
                               <br><p id="coment">Mensagem: <?=$comentario?></p><hr style='width:80vw;'>
                            <?php
                            }
                        ?>
                    </div>
            </div>
        </div>

</body>
</html>