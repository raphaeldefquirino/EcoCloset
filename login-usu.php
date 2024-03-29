<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/media-query.css">
    <script src="https://kit.fontawesome.com/8ad860e92b.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>

    <?php
    
    //inclui o arquivo do menu
    include("menu.php");

    ?>
<!--
  Página de login dividida em duas seções: left-login (com título e imagem) e right-login (com formulário de login).
  O formulário utiliza método POST com ação "includes/login.php" e contém campos para email, senha e botão de login.
  Link "Crie sua conta aqui" direciona para a página de cadastro (cadastro.php).
-->
    <div class="main-login">
        <div class="left-login">
            <h1>Roupas com história, estilo sem igual.</h1>

            <img src="imagens/login.svg" class="img-cad" alt="">

        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Login</h1>
                <form action="includes/login.php" method="post">
                    <div class="textfield">
                        <br>
                        <label for="usuario">Email</label>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="usuario">Senha</label>
                        <input type="password" name="senha" placeholder="Senha">
                    </div>

                    <button class="btn-login">Login</button>
                </form>
                <br>

                <p class="crieconta"><a href="cadastro.php">Crie sua conta aqui</a></p>
            </div>

        </div>


    </div>
    

    <?php

    //inclui o arquivo do rodapé
    include("includes/footer.php");

    ?>
</body>

</html>