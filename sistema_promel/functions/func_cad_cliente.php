<?php

require_once '../connect/connection.php';

extract($_POST);

$sqlInsertUsuario = "INSERT INTO usuario VALUES(0,:nome_usuario,:email_usuario,:endereco_usuario,:senha_usuario)";

$stmt = $conn->prepare($sqlInsertUsuario);
$stmt->bindValue(':nome_usuario', $nome_usuario);
$stmt->bindValue(':email_usuario', $email_usuario);
$stmt->bindValue(':endereco_usuario', $endereco_usuario);
$stmt->bindValue(':senha_usuario', $senha_usuario);
$stmt->execute();
?>
<script>alert('Usuario cadastrado com sucesso')</script>
<meta http-equiv="refresh" content="0; url=../index.php">