<?php

require_once '../connect/connection.php';

extract($_POST);

$sqlInsertUsuario = "INSERT INTO usuario_adm VALUES(0,:nome_adm,:email_adm,:senha_adm)";

$stmt = $conn->prepare($sqlInsertUsuario);
$stmt->bindValue(':nome_adm', $nome_adm);
$stmt->bindValue(':email_adm', $email_adm);
$stmt->bindValue(':senha_adm', $senha_adm);
$stmt->execute();
?>
<script>alert('Adm cadastrado com sucesso')</script>
<meta http-equiv="refresh" content="0; url=../index.php">