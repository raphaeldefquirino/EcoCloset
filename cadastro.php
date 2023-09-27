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

    include_once('includes/menu.php');
    
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

            <form action="includes/cadastrar.php" method="post">


            <div class="textfield">
                <br>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="textfield">
                <br>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
            </div>
            <div class="textfield">
                <br>
                <label for="confirma-senha">Confirmar senha</label>
                <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Senha" required>
            </div>
            <div class="textfield">
                <br>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Nome Completo">
            </div>
            <div class="textfield">
                <br>
                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome" placeholder="Nome Completo" required>
            </div>
            <div class="textfield">
                <br>
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" placeholder="Telefone" required>
            </div>
            <div class="textfield">
                <br>
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" placeholder="CEP" required>
            </div>
            <div class="textfield">
                <br>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" placeholder="Endereço" required>
            </div>
            <div class="textfield">
                <br>
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" id="complemento" placeholder="Endereço" required>
            </div>
            <button class="btn-login">Cadastrar</button>
        </div>
    </div>

    
</div>

</form>

<?php 

include_once('includes/footer.php');

?>

</body>
</html>
    
</body>
</html>