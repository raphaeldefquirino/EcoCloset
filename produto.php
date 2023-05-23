
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

             <div class="textfield">
                <br>
                <label for="usuario">Nome</label>
                <input type="text" name="nome" placeholder="Nome">
            </div>
            <div class="textfield">
                <br>
                <label for="usuario">Quantidade</label>
                <input type="text" name="qtd" placeholder="Quantidade">
            </div>
            <div class="textfield">
                <br>
                <label for="senha">Valor</label>
                <input type="text" name="valor" placeholder="Valor">
            </div>
            <div class="textfield">
                <br>
                <label for="usuario">Descrição do Produto</label>
                <input type="text" name="descr" placeholder="Descrição do Produto">
            </div>

            <div class="custom">

            <div class="textfield">
                <label for="categoria" id="icat">Categoria</label>
               
                <div class="categoria">
                    
                <br>
                <div class="checks">
                <input type="radio" name="categorias" id="catinf">
                <label for="Inferior"> Inferior</label>
                <br>
                <input type="radio" name="categorias" id="catsup">
                <label for="Superior"> Superior</label>
                <br>
                <input type="radio" name="categorias" id="catcal">
                <label for="Calçados"> Calçados</label>
                <br>
                <input type="radio" name="categorias" id="catinf">
                <label for="Acessórios"> Acessórios</label>
            </div>
                <br>
                </div>
            </div>
        </div>
            
            <div class="anexo">
            <div class="textfield">
                <br>
                <label for="usuario">Produto</label>
                <input type="file" name="image">
            </div>
            </div>
           
            <button class="btn-login">Cadastrar</button>
        </div>
    </div>

    
</div>

<footer>
    <div class="container-footer">
        <div class="row-footer">
            <!-- coluna footer -->
            <div class="footer-col">
                <div class="logo-title">
                    <img src="imagens/logoroxamenor.png" alt="Image" height="50" width="50">
                    <h4>EcoCloset</h4>
                </div>
                <ul class="EcoCloset">
                    <li> <a href=""> Seu Brechó online</a> </li>
                    <li> <a href=""> "Roupas usadas<br>histórias renovadas"</a> </li>
                </ul>
            </div>
            <!-- fim coluna footer -->
            <!-- coluna footer-->
            <div class="footer-col">
                <h4>Contato</h4>
                <ul>
                    <li> <a href=""> EcoCloset@gmail.com</a> </li>
                    <br>
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>
                      </ul>

                </ul>
            </div>
            <!-- fim coluna footer-->
            <!-- coluna footer-->
            <div class="footer-col">
                <h4>Páginas</h4>
                <ul>
                    <li> <a href=""> Home</a> </li>
                    <li> <a href=""> Femininas</a> </li>
                    <li> <a href=""> Masculinas</a> </li>
                    <li> <a href=""> Sobre nós</a> </li>
                    <li> <a href=""> Venda</a> </li>
                </ul>
            </div>
            <!-- fim coluna footer-->
    
    </div>
    </div>
</footer>

</body>
</html>
    
</body>
</html>