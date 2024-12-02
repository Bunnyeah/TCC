<?php
    header("Location: produtos.php")
?>
<?php
if (isset($_SESSION["adm"])) {
} else {

    header("Location: ../login.php");
    exit();
}
?>