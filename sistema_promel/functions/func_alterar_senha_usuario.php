<?php

require_once '../connect/connection.php';

extract($_POST);

$sqlUpdSenhaUsuario = "UPDATE usuario SET senha = senha WHERE usuario = nome_usuario ";

$stmt = $conn->prepare($sqlUpdSenhaUsuario);
$stmt->bindValue(':senha', $senha);
$stmt->execute();
?>
<script>alert('Senha alterada com sucesso')</script>
<meta http-equiv="refresh" content="0; url=../index.php">