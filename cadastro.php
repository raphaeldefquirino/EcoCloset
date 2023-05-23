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
    <title>Cadastro</title>
</head>
<body class="cad">

    <?php 

    include_once('menu.php');
    
    ?>

<div class="main-login">
    <div class="left-login">
        <h1>Entre para nossa turma</h1>

        <img src="imagens/shopping-animate.svg" class="img-cad" alt="">

        </div>
    <div class="right-login">
        <div class="card-login">
            <h1>Cadastro</h1>

            <?php

            if(isset($_SESSION['usuario_existe'])):

            ?>


            <div class="caixa-CadastroErro">
                <div class="menssagemErro">
                    
                    <p>ATENÇÃO!! <br>
                        Houve um erro ao cadastrar-se. <br>
                            Tente novamente</p> 
        
                </div>
            </div>

            <?php 
                endif;
                unset($_SESSION['usuario_existe']);
            ?>


            <?php 

             if(isset($_SESSION['status_cadastro'])):

            ?>

            <div class="caixa-CadastroCerto">
                <div class="menssagemCerto">
                    
                    <p>Cadastrado com sucesso!</p> 
        
                </div>
            </div>


            <?php 
            endif;
            unset($_SESSION['status_cadastro']);
            ?>

            <form action="cadastrar.php" method="post">


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
            <div class="textfield">
                <br>
                <label for="usuario">Nome Completo</label>
                <input type="text" name="nome" placeholder="Nome Completo">
            </div>
            <div class="textfield">
                <br>
                <label for="senha">Endereço</label>
                <input type="text" name="endereco" placeholder="Endereço">
            </div>
            <div class="textfield">
                <br>
                <label for="usuario">Telefone</label>
                <input type="text" name="telefone" placeholder="Telefone">
            </div>
            <button class="btn-login">Cadastrar</button>
        </div>
    </div>

    
</div>

</form>

<?php 

include_once('footer.php');

?>

</body>
</html>
    
</body>
</html>