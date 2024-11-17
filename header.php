<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    #menu{
        background: #133A41;
        display: flex;
        height: auto;
        width: 100vw;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
    }
    #logo img {max-width: 100%; height: auto;}
    #text_buscar{
        border-radius: 50px;
        padding: 20px;
        height: 4vh; /* vh -> altera de acordo com a ALTURA da interface */
        width: 60vw; /* vw -> altera de acordo com a LARGURA da interface */
        border-style: none;
        background-image:url("./assets/imgs/icons/search.svg");
        background-repeat: no-repeat;
        background-position: right;
        background-size: 4vh;
      }
    #perfilicon{
          height:2.5rem;
          width:2.5rem;
          border-radius: 50%;
      }
    #carrinhoicon{
      margin-right: 5vw;
      height:2.5rem;
      width:2.5rem;
    }
    #carrinhoicon:hover, #perfilicon:hover{
      transition: 0.5s;
      height: 3rem;
      width: 3rem;
    }
  </style>
  <title>Home Page</title>
</head>
<body>
  <?php
    session_start();
    require_once './connection/connection.php';
    $imagem = "./assets/imgs/icons/Group.svg";
    if (isset($_SESSION["loggedin"])) {
      $imagem = "./uploads/".$_SESSION["idusuario"];
    }
  ?>
  <!-- MENU -->
  <header id="menu">
    <a href="./homepage.php"><img src="./assets/imgs/logo/logo (2).jpg" alt="Logo Promel"></a>

    <form action="pesquisa.php" method="GET">
    <input id="text_buscar" type="search" name="query" placeholder="Buscar...">
    </form>

    <a href="./user/perfil.php"><img src="<?=$imagem?>" alt="conta" id="perfilicon"></a> 
    <a href="./carrinho2.php"><img src="./assets/imgs/icons/carrinho.svg" id="carrinhoicon"></a>
  </header>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>