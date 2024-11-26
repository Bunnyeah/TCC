<?php

session_start(); 

include_once '../connection/connection.php';

date_default_timezone_set('America/Sao_Paulo');

if (!empty($_POST['estrela'])) {

    // Receber os dados do formulário
    $estrela = filter_input(INPUT_POST, 'estrela', FILTER_DEFAULT);
    $mensagem = filter_input(INPUT_POST, 'comentario', FILTER_DEFAULT);

    $query_avaliacao = "INSERT INTO avaliacoes (qtd_estrela, comentario, created) VALUES (:qtd_estrela, :comentario, :created)";

    $cad_avaliacao = $conn->prepare($query_avaliacao);

    $cad_avaliacao->bindParam(':qtd_estrela', $estrela, PDO::PARAM_INT);
    $cad_avaliacao->bindParam(':comentario', $mensagem, PDO::PARAM_STR);
    $cad_avaliacao->bindParam(':created', date("Y-m-d H:i:s"));

    // Acessa o IF quando cadastrar corretamente
    if ($cad_avaliacao->execute()) {

        $_SESSION['msg'] = "<p style='color: green;'>Avaliação cadastrar com sucesso.</p>";
        header("Location: ../info_produto.php?id=" . $produto_ID);
    } else {

        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Avaliação não cadastrar.</p>";
        header("Location: ../info_produto.php?id=" . $produto_ID);
    }
} else {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário selecionar pelo menos 1 estrela.</p>";
    header("Location: ../info_produto.php?id=" . $produto_ID);
    exit;
}
