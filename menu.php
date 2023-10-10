<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/8ad860e92b.js" crossorigin="anonymous"></script>
    
</head>
<body>
<header class="header">

<div class="logo">
    
    <a href="index.php">
        <img src="imagens/logoroxamenor.png" w class="" height="50px" width="50px" alt="">
        
    </a>

    <a href="index.php" style="text-decoration: none;">
        <h1 > EcoCloset</h1>
    </a>
    
</div>

<div class="navigation">

    <input type="checkbox" class="toggle-menu">
    <div class="hamburger"></div>

  <ul class="menu">
    <form action="searchPage.php" method="post">
    <div class="serch-box">
        <input class = "search-txt" name="search"  id="search" type="search" placeholder="Pesquisar..." />
        <button class = "search-btn" type="submit" name="buscar"><i class="fa-solid fa-magnifying-glass"></i></button>  
    </form>
    </div>
    <li><a href="index.php">Home</a></li>
    <li><a href="feminina.php">Femininas</a></li>
    <li><a href="kids.php">Kids</a></li>
    <li><a href="masculina.php">Masculinas</a></li>
    <li><a href="produto.php">Vender</a></li>
    <li><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
    <li><a href="new-usu.php"><i class="fa-regular fa-user"></i></a></li>
</div>


</header>
</body>
</html>