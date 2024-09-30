<?php
require_once '../connection/connection.php';

$sqlListarEstoque = "SELECT * FROM produto INNER JOIN cliente ON produto.id_produto = cliente.id_cliente ";
$stmt = $conn->query($sqlListarEstoque);
$Estoques = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="pt-br">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<script src="../assets/js/jquery.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.js" type="text/javascript"></script>
    <title>Estoque 📦</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #f2f2f2;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>#</th>
            <th>Nome do Produto</th>
            <th>Preço</th>
        </tr>
        <?php
        foreach ($Estoques as $Estoque) {
            echo "<tr>";
            echo "<td>{$Estoque->id_produto}</td>";
            echo "<td>{$Estoque->nome_produto}</td>";
            echo "<td>{$Estoque->preco}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>