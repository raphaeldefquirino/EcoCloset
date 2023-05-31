
<?php 
session_start();
include ('verifica-login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/media-query.css">
    <title>Cadastro do Produto</title>
</head>
<body class="cad">

    <?php 
    
    include("menu.php");

    ?>

<div class="main-login">
    <div class="left-login">
        <br>
        <h1>Cadastre seu Produto</h1>

        <img src="imagens/catalogue-animate.svg" class="img" alt="">

        </div>
    <div class="right-login">
        <div class="card-login">
            
            <h1>Cadastro</h1>

            <?php

            if(isset($_SESSION['erro_prod'])):

            ?>

           
            <div class="caixa-CadastroErro">
                <div class="menssagemErro">
                    
                    <p>ATENÇÃO!! <br>
                        Houve um erro ao cadastrar o produto <br>
                        Verifique os dados e tente novamente</p> 
        
                </div>
            </div>

            <?php 
            
                endif;
                unset($_SESSION['erro_prod']);
            
            ?>

            <?php

            if(isset($_SESSION['prod_cadastrado'])):

            ?>    

            <div class="caixa-CadastroCerto">
                <div class="menssagemCerto">
                    
                    <p>Produto cadastrado com sucesso!</p> 
        
                </div>
            </div>

            <?php 
            
            endif;
            unset($_SESSION['prod_cadastrado']);

            ?>

            <form action="cad-prod.php" method="post" enctype="multipart/form-data">
             <div class="textfield">
                <br>
                <label for="usuario">Nome do produto</label>
                <input type="text" name="nome_prod" placeholder="Nome">
            </div>
            <div class="textfield">
                <br>
                <label for="usuario">Quantidade em estoque</label>
                <input type="text" name="qtd" placeholder="Quantidade">
            </div>
            <div class="textfield">
                <br>
                <label for="senha">Valor do produto</label>
                <input type="text" name="valor" placeholder="Valor">
            </div>
            <div class="textfield">
                <br>
                <label for="usuario">Descrição do Produto</label>
                <input type="text" name="descr" placeholder="Descrição do Produto">
            </div>

            <div class="textfield">
                    <br>
                    <label for="usuario">Telefone</label>
                    <input type="text" name="telefone" placeholder="Telefone">
                </div>

            <div class="custom">

            <div class="textfield">
                <label for="categoria" id="icat">Tipo do produto</label>
               
                <div class="categoria">
                    
                <br>
                <div class="checks">
                <input type="radio" name="categoria" value = "Masculina" id="catinf">
                <label for="Inferior">Masculina</label>
                <br>
                <input type="radio" name="categoria" value = "Feminina" id="catsup">
                <label for="Superior">Feminina</label>
            </div>
                <br>
                </div>
            </div>
        </div>
            
            <div class="anexo">
            <div class="textfield">
                <br>
                <label for="usuario">Produto</label>
                <input type="file" name="arquivo">
            </div>
            </div>
           
            <button class="btn-login">Cadastrar</button>
        </div>
    </div>
</div>
</form>

<?php 
    
    include("footer.php");

?>

</body>
</html>
    
</body>
</html>