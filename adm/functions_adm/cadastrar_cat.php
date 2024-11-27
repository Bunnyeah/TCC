    <!-- Func Cadastro Categorias -->
    <?php

    require_once '../../connection/connection.php';
    
    extract($_POST);

    // VERIFICANDO SE JA EXISTE NO BANCO
    $sqlVerificar = "SELECT * FROM categoria WHERE Nome = :Nome";
    $verificar = $conn->prepare($sqlVerificar);
    $verificar->bindValue(":Nome",$Nome);
    $verificar->execute();

    // INSERIR
    if($verificar->rowCount() === 0){ 
        $sqlInsertCategoria = "INSERT INTO categoria VALUES(0,:Nome)";
        $stmt = $conn->prepare($sqlInsertCategoria);
        $stmt->bindValue(":Nome", $Nome);
        $stmt->execute();

        header("location: ../categorias.php")
    ?>
    <!-- <script>alert('Categoria cadastrada com sucesso :3')</script> -->

<?php
}else{
    header("location: ../categorias.php")
?>
<!-- <script>alert('Essa categoria ja está cadastrada!')</script> -->

<?php
}
?>


