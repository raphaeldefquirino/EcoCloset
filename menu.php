<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="seu-arquivo-de-estilos.css"> <!-- Certifique-se de adicionar o caminho correto para seu arquivo de estilos -->
    <script src="https://kit.fontawesome.com/8ad860e92b.js" crossorigin="anonymous"></script>
    <title>EcoCloset</title>
</head>
<body>

<!-- Cabeçalho -->
<header class="header">

    <!-- Logo e Nome -->
    <div class="logo">
        <a href="index.php">
            <img src="imagens/logoroxamenor.png" class="" height="50px" width="50px" alt="">
        </a>
        <a href="index.php" style="text-decoration: none;">
            <h1 style="font-weight:bolder;">EcoCloset</h1>
        </a>
    </div>

    <!-- Navegação -->
    <div class="navigation">

        <!-- Ícone de menu responsivo -->
        <input type="checkbox" class="toggle-menu">
        <div class="hamburger"></div>

        <!-- Lista de menu -->
        <ul class="menu">
            <!-- Formulário de pesquisa -->
            <form action="searchPage.php" method="post">
                <div class="search-box">
                    <input style="color: black;" class="search-txt" name="search" id="search" type="search" placeholder="Pesquisar..." />
                    <button class="search-btn" type="submit" name="buscar"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            
            <!-- Itens do menu -->
            <li><a href="index.php">Home</a></li>
            <li><a href="feminina.php">Femininas</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="masculina.php">Masculinas</a></li>
            <li><a href="produto.php">Vender</a></li>
            <li><a href="new-usu.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            <li><a href="new-usu.php"><i class="fa-regular fa-user"></i></a></li>
        </ul>

    </div>

</header>

</body>
</html>
