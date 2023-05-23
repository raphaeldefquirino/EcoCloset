<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/media-query.css">
    <title>Login</title>
</head>
<body>
   
    <?php 
   
    include("menu.php");

   ?>

    <div class="main-login">
        <div class="left-login">
            <h1>Roupas com história, estilo sem igual.</h1>
    
            <img src="imagens/login.svg" class="img-cad" alt="">
    
            </div>
        <div class="right-login">
            <div class="card-login">
                <h1>Login</h1>
                <form action="login.php" method="post">
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
                
                <p><a href="cadastro.php">Crie sua conta aqui</a></p>
            </div>
            
        </div> 
    
        
    </div>

    <?php 
   
   include("footer.php");

   ?>
</body>
</html>