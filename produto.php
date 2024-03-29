<?php
//inicia a sessão para navegar com as variáveis entre as páginas 
session_start();

//inclui o arquivo que faz a conexão com o banco de dados
include('includes/verifica-login.php');
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
    <title>Cadastro do Produto</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body class="cad">

    <?php
	//inclui o arquivo do menu
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
                //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                if (isset($_SESSION['erro_prod'])) :

                ?>


                    <div class="caixa-CadastroErro">
                        <div class="menssagemErro">

                            <p>ATENÇÃO!! <br>
                                Houve um erro ao cadastrar o produto <br>
                                Verifique os dados e tente novamente</p>

                        </div>
                    </div>

                <?php
                //encerra a condição 'if' e encerra a variável de sessão para que a mensagem não só seja exibida assim que for chamada 
                endif;
                unset($_SESSION['erro_prod']);

                ?>


                <?php
                //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                if (isset($_SESSION['error_arquivo'])) :

                ?>


                    <div class="caixa-CadastroErro">
                        <div class="menssagemErro">

                            <p>ATENÇÃO!! <br>
                                Tipo de arquivo não aceito<br></p>

                        </div>
                    </div>

                <?php
                //encerra a condição 'if' e encerra a variável de sessão para que a mensagem não só seja exibida assim que for chamada 
                endif;
                unset($_SESSION['error_arquivo']);

                ?>


                <?php
                //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
                if (isset($_SESSION['prod_cadastrado'])) :

                ?>

                    <div class="caixa-CadastroCerto">
                        <div class="menssagemCerto">

                            <p>Produto cadastrado com sucesso!</p>

                        </div>
                    </div>

                <?php
                //encerra a condição 'if' e encerra a variável de sessão para que a mensagem não só seja exibida assim que for chamada 
                endif;
                unset($_SESSION['prod_cadastrado']);

                ?>

                <form action="cad-prod.php" method="post" enctype="multipart/form-data" id="meuFormulario">
                    <div class="textfield">
                        <br>
                        <label for="usuario">Nome simples</label>
                        <input type="text" name="nome_prod" placeholder="De um titulo simples para o seu produto">
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="senha">Valor do produto</label>
                        <input type="text" name="valor" placeholder="Valor" id="valor">
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="usuario">Descrição do Produto</label>
                        <input type="text" name="descr" placeholder="De uma descrição mais detalhado do seu produto">
                    </div>

                    <div class="custom">

                        <div class="textfield">
                            <label for="categoria" id="icat">Tipo do produto</label>

                            <div class="categoria">

                                <br>
                                <div class="checks">
                                    <input type="radio" name="categoria" value="Masculina" id="catinf">
                                    <label for="Inferior">Masculina</label>
                                    <br>
                                    <input type="radio" name="categoria" value="Feminina" id="catsup">
                                    <label for="Superior">Feminina</label>
                                    <br>
                                    <input type="radio" name="categoria" value="Kids" id="catsup">
                                    <label for="Superior">Kids</label>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="textfield">
                        <br>
                        <label for="">Subcategoria do produto</label>
                        <select name="subcategoria" id="">

                            <option value="Acessório">Acessório</option>
                            <option value="Biquíni">Bíquini</option>
                            <option value="Blazer">Blazer</option>
                            <option value="Blusa">Blusa</option>
                            <option value="Calça">Calça</option>
                            <option value="Calçado">Calçado</option>
                            <option value="Camisa">Camisa</option>
                            <option value="Cinto">Cinto</option>
                            <option value="Conjunto">Conjunto</option>
                            <option value="Cropped">Cropped</option>
                            <option value="Legging">Legging</option>
                            <option value="Macacão">Macacão</option>
                            <option value="Pijama">Pijama</option>
                            <option value="Saia">Saia</option>
                            <option value="Shorts">Shorts</option>
                            <option value="Sueter">Suéter</option>
                            <option value="Terno">Terno</option>
                            <option value="Vestido">Vestido</option>

                        </select>
                    </div>
                    <div class="custom">

                        <div class="textfield">
                            <label for="categoria" id="icat">Condição do produto</label>

                            <div class="categoria">

                                <br>
                                <div class="checks">
                                    <input type="radio" name="condicao" value="Usado" id="catinf">
                                    <label for="Inferior">Usado</label>
                                    <br>
                                    <input type="radio" name="condicao" value="Pouco Usado" id="catsup">
                                    <label for="Superior">Pouco usado</label>
                                    <br>
                                    <input type="radio" name="condicao" value="Novo" id="catsup">
                                    <label for="Superior">Novo</label>
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
                    <br>
                    <div class="textfield">


                        <div class="categoria">

                            <br>
                            <div class="checks">
                                <input type="checkbox" name="termo" value="checked" id="catinf">
                                <label for="Inferior">Declaro que li e concordo integralmente com <a href="imagens/termos-ecocloset.pdf" target="_blank">Termo de Uso</a></label>
                                <br>

                            </div>
                            <br>
                        </div>
                    </div>

                    <button class="btn-login">Cadastrar</button>
            </div>
        </div>
    </div>
    </form>

    <?php
    //verifica se a várivel de sessão existe, servirá para exbir uma mensagem para o usuário 
    if (isset($_SESSION['erroTermo'])) :

    ?>

        <script>
            alert("Para cadastrar um produto você deve concordar com os termos de uso!");
        </script>

    <?php
    //encerra a condição 'if' e encerra a variável de sessão para que a mensagem não só seja exibida assim que for chamada 
    endif;
    unset($_SESSION['erroTermo']);

    ?>

    <?php
    //inclui o arquivo do rodapé
    include("includes/footer.php");

    ?>


    <script>
        $(document).ready(function() {

            $('#meuFormulario').submit(function(event) {
                // Adicione aqui outras validações se necessário

                // Verifica o tamanho do campo "Nome simples"
                var nomeSimples = $('input[name="nome_prod"]').val();
                if (nomeSimples.length > 25) {
                    alert("O campo Nome simples deve ter no máximo 25 caracteres.");
                    event.preventDefault(); // Impede o envio do formulário
                }
            });

        });
    </script>

</body>

</html>

</body>

</html>