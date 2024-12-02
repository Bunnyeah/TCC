<?php
require_once '../connection/connection.php';

// Excluir feedback
if (isset($_POST['excluir_feedback'])) {
    $id = $_POST['id'];  
    $sqlDelete = "DELETE FROM avaliacoes WHERE id_avaliacao = id_avaliacao";
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->execute([$id]);
}

// Obter avaliações
$query_avaliacoes = "SELECT id_avaliacao, qtd_estrela, comentario FROM avaliacoes";
$result_avaliacoes = $conn->prepare($query_avaliacoes);
$result_avaliacoes->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar as Avaliacoes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/nav.css" rel="stylesheet">
    <link href="../assets/css/adm/feedback.css" rel="stylesheet">
    <link href="../assets/css/info_produto.css" rel="stylesheet">
</head>
<body>
<div id="messageContainer"></div>

<!-- Navbar -->
<?php include "navbar.php"?>

<!-- Título -->
<div id="containertotal">
    <h3 id="Title" class="my-md-5">Feedbacks</h3>

    <div class="container">
        <?php while ($row_avaliacao = $result_avaliacoes->fetch(PDO::FETCH_ASSOC)) {
            extract($row_avaliacao);
        ?>
        <div id="feedback_<?=$id_avaliacao?>" class="feedback-item" style="position: relative; margin-bottom: 20px;">
            <p>Avaliação: <?=$id_avaliacao?></p>
            <!-- Exibir estrelas -->        
            <?php for ($i = 1; $i <= 5; $i++) {
                if ($i <= $qtd_estrela) {
                    echo '<i class="estrela-preenchida fa-solid fa-star"></i>';
                } else {
                    echo '<i class="estrela-vazia fa-solid fa-star"></i>';
                }
            } ?>
            <p id="coment" style="margin: 0;">Mensagem: <?=$comentario?></p>
            <button id="btn-excluir" class="fa-solid fa-trash text-danger fa-2x" data-id="<?=$id_avaliacao?>" style="position: absolute; right: 70px; bottom: 40px; background: none; border: none; cursor: pointer;"></button>
            <hr style='width:80vw;'>
        </div>
        <?php } ?>
    </div>
</div>

<script>
document.querySelectorAll('#btn-excluir').forEach(function(button) {
    button.addEventListener('click', function() {
        const feedbackId = this.getAttribute('data-id');
        
        if (confirm('Tem certeza de que deseja excluir esta avaliação?')) {
            fetch('excluir_feedback.php', {
                method: 'POST',
                body: new URLSearchParams({
                    'excluir_feedback': true,
                    'id': feedbackId
                }),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            })
            .then(response => response.text())
            .then(data => {
                const feedbackItem = document.getElementById('feedback_' + feedbackId);
                feedbackItem.remove();
                alert('Avaliação excluída com sucesso!');
            })
            .catch(error => {
                console.error('Erro ao excluir avaliação:', error);
                alert('Erro ao excluir a avaliação.');
            });
        }
    });
});
</script>

</body>
</html>